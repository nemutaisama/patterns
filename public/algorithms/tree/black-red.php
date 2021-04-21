<?php

class Node implements JsonSerializable
{
    public const RED   = 0;
    public const BLACK = 1;

    protected ?int $value;
    protected ?int $color;
    protected ?Node $parent;
    protected ?Node $left;
    protected ?Node $right;

    public function __construct(int $value = null)
    {
        $nilChild = new NilNode();
        $nilChild->setParent($this);

        $this
            ->setValue($value)
            ->setLeft($nilChild)
            ->setRight($nilChild)
            ->setRed();
    }

    public function addChild(Node $child)
    {
        $child->setParent($this);

        if ($child->getValue() < $this->getValue()) {
            $this->setLeft($child);
        } else {
            $this->setRight($child);
        }
    }

    /**
     * @return bool
     */
    public function isRed(): bool
    {
        return $this->color === self::RED;
    }

    /**
     * @return bool
     */
    public function isBlack(): bool
    {
        return $this->color === self::BLACK;
    }

    public function isNil(): bool
    {
        return ($this instanceof NilNode);
    }

    public function isRoot(): bool
    {
        return $this->getParent()->isNil();
    }

    public function isLeftChild(): bool
    {
        return $this->getParent()->getLeft() === $this;
    }

    public function isRightChild(): bool
    {
        return $this->getParent()->getRight() === $this;
    }

    /**
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * @return Node
     */
    public function getLeft(): Node
    {
        return $this->left;
    }

    /**
     * @return Node
     */
    public function getRight(): Node
    {
        return $this->right;
    }

    /**
     * @return Node
     */
    public function getParent(): Node
    {
        return $this->parent;
    }

    /**
     * @param int|null $value
     * @return Node
     */
    public function setValue(?int $value): Node
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param Node $parent
     * @return Node
     */
    public function setParent(Node $parent): Node
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @param Node $left
     * @return Node
     */
    public function setLeft(Node $left): Node
    {
        $this->left = $left;

        return $this;
    }

    /**
     * @param Node $right
     * @return Node
     */
    public function setRight(Node $right): Node
    {
        $this->right = $right;

        return $this;
    }

    /**
     * @return $this
     */
    public function setBlack(): Node
    {
        $this->color = self::BLACK;

        return $this;
    }

    /**
     * @return $this
     */
    public function setRed(): Node
    {
        $this->color = self::RED;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'color' => $this->isRed() ? '#c33' : '#000',
            'value' => $this->value,
            'left'  => $this->left,
            'right' => $this->right,
        ];
    }
}

class NilNode extends Node
{

    public function __construct()
    {
        $this
            ->setValue(null)
            ->setBlack();
        $this->left = null;
        $this->right = null;
        $this->parent = null;
    }

    public function isBlack(): bool
    {
        return true;
    }

    public function isRed(): bool
    {
        return false;
    }
}

class RedBlackTree implements JsonSerializable
{
    private Node $root;

    public function __construct()
    {
        $this->root = new NilNode();
    }

    /**
     * @param $value
     * @throws Exception
     */
    public function insert($value): void
    {
        $insertedNode = new Node($value);

        if ($this->isEmpty()) {
            $this->setRoot($insertedNode);

            return;
        }

        $parent = $this->findParent($insertedNode->getValue());

        $parent->addChild($insertedNode);

        $this->insertFixUp($insertedNode);
    }

    public function getStructure()
    {
        $this->buildNode($this->root);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->root->isNil();
    }

    /**
     * @param Node $node
     * @throws Exception
     */
    public function setRoot(Node $node): void
    {
        if ($this->isEmpty()) {
            $this->root = $node;
            $this->root
                ->setBlack()
                ->setParent(new NilNode());
        } else {
            throw new Exception('Root can be set manualy only on new tree');
        }
    }

    /**
     * @param $value
     * @return Node
     * @throws Exception
     */
    private function findParent(int $value): Node
    {
        if ($this->isEmpty()) {
            throw new Exception('Tree is empty, add root before search for parent node');
        }

        $node = $this->root;

        while (!($node->isNil())) {
            if ($value < $node->getValue()) {
                $node = $node->getLeft();
            } else {
                $node = $node->getRight();
            }
        }

        return $node->getParent();
    }



    private function insertFixUp(Node $node): void
    {
        while ($node->getParent()->isRed()) {

            if ($node->getParent()->isLeftChild()) {

                $checkNode = $node->getParent()->getParent()->getRight();

                if ($checkNode->isRed()) {
                    $node->getParent()->setBlack();
                    $checkNode->setBlack();
                    $node->getParent()->getParent()->setRed();
                    $node = $node->getParent()->getParent();
                } else {
                    if ($node->isRightChild()) {
                        $node = $node->getParent();
                        $this->leftRotate($node);
                    }

                    $node->getParent()->setBlack();
                    $node->getParent()->getParent()->setRed();
                    $this->rightRotate($node->getParent()->getParent());
                }
            } else {
                $checkNode = $node->getParent()->getParent()->getLeft();

                if ($checkNode->isRed()) {
                    $node->getParent()->setBlack();
                    $checkNode->setBlack();
                    $node->getParent()->getParent()->setRed();
                    $node = $node->getParent()->getParent();
                } else {
                    if ($node->isLeftChild()) {
                        $node = $node->getParent();
                        $this->rightRotate($node);
                    }

                    $node->getParent()->setBlack();
                    $node->getParent()->getParent()->setRed();
                    $this->leftRotate($node->getParent()->getParent());
                }
            }
        }

        $this->root->setBlack();
    }

    private function leftRotate(Node $node): void
    {
        $popNode = $node->getRight();

        $node->setRight($popNode->getLeft());
        $popNode->getLeft()->setParent($node);

        $this->swapNodes($node, $popNode);

        $popNode->setLeft($node);
        $node->setParent($popNode);
    }

    private function rightRotate(Node $node): void
    {
        $popNode = $node->getLeft();

        $node->setLeft($popNode->getRight());
        $popNode->getRight()->setParent($node);

        $this->swapNodes($node, $popNode);

        $popNode->setRight($node);
        $node->setParent($popNode);
    }

    private function swapNodes(Node $oldChild, Node $newChild): void
    {
        $newChild->setParent($oldChild->getParent());

        if ($oldChild->isRoot()) {
            $this->root = $newChild;
        } elseif ($oldChild->isLeftChild()) {
            $oldChild->getParent()->setLeft($newChild);
        } else {
            $oldChild->getParent()->setRight($newChild);
        }
    }




    private function buildNode(Node $node): void
    {
        if ($node->isNil()) {
            return;
        }
        $color = $node->isRed() ? 'r:' : 'b:';
        echo $color . $node->getValue() . "\n";
        echo $node->getLeft()->getValue() . ' | ' . $node->getRight()->getValue() . "\n";
    }

    public function jsonSerialize()
    {
        return [
            'tree' => $this->root
        ];
    }
}

$tree = new RedBlackTree();
$tree->insert(23);
$tree->insert(21);
$tree->insert(19);
$tree->insert(17);
$tree->insert(15);
$tree->insert(13);
$tree->insert(11);
$tree->insert(9);
$tree->insert(7);
$tree->insert(5);
$tree->insert(3);
echo json_encode($tree);
