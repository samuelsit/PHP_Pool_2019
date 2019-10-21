<?php
function creationPanier(){
    if (!isset($_SESSION['panier'])){
       $_SESSION['panier']=array();
       $_SESSION['panier']['idProduit'] = array();
       $_SESSION['panier']['nameProduit'] = array();
       $_SESSION['panier']['qteProduit'] = array();
       $_SESSION['panier']['prixProduit'] = array();
       $_SESSION['panier']['photoProduit'] = array();
       $_SESSION['panier']['mntPanier'] = 0;
    }
    return true;
 }

function ajouterArticle($idProduit,$qteProduit,$prixProduit, $photoProduit, $nameProduit){
   if (creationPanier())
   {
      $positionProduit = array_search($idProduit,  $_SESSION['panier']['idProduit']);
 
      if ($positionProduit !== false)
       {
         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         array_push( $_SESSION['panier']['idProduit'],$idProduit);
         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
         array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
         array_push( $_SESSION['panier']['photoProduit'],$photoProduit);
         array_push( $_SESSION['panier']['nameProduit'], $nameProduit);
      }
   }
   else
      echo "Un problème est survenu.";
}

function supprimerArticle($idProduit){
   if (creationPanier())
   {
      $tmp=array();
      $tmp['idProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      $tmp['photoProduit'] = array();
      $tmp['nameProduit'] = array();

      for($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++)
      {
         if ($_SESSION['panier']['idProduit'][$i] !== $idProduit)
         {
            array_push( $tmp['idProduit'],$_SESSION['panier']['idProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
            array_push( $tmp['photoProduit'],$_SESSION['panier']['photoProduit'][$i]);
            array_push( $tmp['nameProduit'],$_SESSION['panier']['nameProduit'][$i]);
         }
      }
      $_SESSION['panier'] =  $tmp;
      unset($tmp);
   }
   else
      echo "Un problème est survenu.";
}

function supprimePanier(){
   unset($_SESSION['panier']);
   setcookie("nbArt", "", time()-3600, "/");
}

function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   $_SESSION['panier']['mntPanier'] = $total;
   return $total;
}
?>