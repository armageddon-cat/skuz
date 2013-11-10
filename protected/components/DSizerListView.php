<?php
Yii::import('zii.widgets.CListView');

/**
* DSizerListView adds a block "Show by: 10 20 30" (items per page size switcher)
*
* <pre>
* <?php $this->widget('DSizerListView', array(
* 'dataProvider'=>$dataProvider,
* 'itemView'=>'_view',
* 'template'=>"{sizer}\n{summary}\n{items}\n{pager}",
* 'sizerVariants'=>array(10, 20, 30),
* 'sizerAttribute'=>'size',
* 'sizerCssClass'=>'sorter',
* 'sizerHeader'=>'Show per page: ',
* )); ?>
* </pre>
*
* @author ElisDN <mail@elisdn.ru>
* @link http://www.elisdn.ru
* @version 1.0
*/
class DSizerListView extends CListView
{
    /**
* @var boolean whether to enable sizer
* Defaults to true.
*/
    public $enableSizer = true;

    /**
* @var string GET attribute
*/
    public $sizerAttribute = 'pageSize';

    /**
* @var array items per page sizes variants
*/
    public $sizerVariants = array(10, 20, 50, 100);

    /**
* @var string CSS class of sorter element
*/
    public $sizerCssClass = 'sizer';

    /**
* @var string the text shown before sizer links. Defaults to empty.
*/
    public $sizerHeader = 'Show by: ';

    /**
* @var string the text shown after sizer links. Defaults to empty.
*/
    public $sizerFooter = '';

    public function init()
    {
        if (!isset($this->sizerVariants[0]))
            $this->sizerVariants = array(10);

        if ($this->enableSizer)
        {
            $pageSize = Yii::app()->request->getQuery($this->sizerAttribute, $this->sizerVariants[0]);
            $this->dataProvider->getPagination()->setPageSize($pageSize);
        }

        parent::init();
    }

    public function renderSizer()
    {
        if (!$this->enableSizer)
            return;

        $itemCount = $this->dataProvider->getItemCount();

        if ($itemCount <= 0 || $itemCount < $this->sizerVariants[0])
            return;

        $pageSize = $this->dataProvider->getPagination()->getPageSize();
        $pageVar = $this->dataProvider->getPagination()->pageVar;

        echo CHtml::openTag('div', array('class' => $this->sizerCssClass)) . "\n";
        echo $this->sizerHeader;
        echo "<ul>\n";

        foreach($this->sizerVariants as $count)
        {
            $params = array_replace($_GET, array($this->sizerAttribute => $count));

            if (isset($params[$pageVar]))
                unset($params[$pageVar]);

            echo "<li>";
            if ($count == $pageSize)
                echo $count;
            else
                echo CHtml::link($count, Yii::app()->controller->createUrl('', $params));
            echo "</li>\n";
        }

        echo "</ul>";
        echo $this->sizerFooter;
        echo CHtml::closeTag('div');
    }
}