<?php
class sfValidatorGMapAddress extends sfValidatorBase
{
  protected function doClean($value)
  {
    //if (!is_array($value))
   // {
	//echo "entro al error";
   //   throw new sfValidatorError($this, 'Ubicación invalida');
   // }
 echo "la ".$value['latitude']. " lo ".$value['longitude']." a ".$value['address'];
    try
    {
      $latitude = new sfValidatorNumber(array( 'min' => -90, 'max' => 90, 'required' => true ));
      $value['latitude'] = $latitude->clean(isset($value['latitude']) ? $value['latitude'] : null);
 
      $longitude = new sfValidatorNumber(array( 'min' => -180, 'max' => 180, 'required' => true ));
      $value['longitude'] = $longitude->clean(isset($value['longitude']) ? $value['longitude'] : null);
 
      $address = new sfValidatorString(array( 'min_length' => 10, 'max_length' => 255, 'required' => true ));
      $value['address'] = $address->clean(isset($value['address']) ? $value['address'] : null);
    }
    catch(sfValidatorError $e)
    {
      throw new sfValidatorError($this, 'Ubicación invalida');
    }
 
    return $value;
  }
}