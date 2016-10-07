<?php
echo "aqui";
foreach ($contenidos as $contenido):
    echo "Contenidos". $contenido->getTitulo();
 endforeach; 

/*
 foreach ($this->getProductCategory() as $product_category)
{
  $categories_for_indexing .= $product_category->getCategory()->getName() . ' ';
}
$doc->addField(Zend_Search_Lucene_Field::UnStored('categories', $categories_for_indexing));

 */
?>