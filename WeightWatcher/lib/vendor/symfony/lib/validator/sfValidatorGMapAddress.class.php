<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfValidatorCSRFToken checks that the token is valid.
 *
 * @package    symfony
 * @subpackage validator
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfValidatorCSRFToken.class.php 7902 2008-03-15 13:17:33Z fabien $
 */
class sfValidatorGMapAddress extends sfValidatorBase
{
  protected function doClean($value)
  {
    if (!is_array($value))
    {
      throw new sfValidatorError($this, 'invalid');
    }
 
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
      throw new sfValidatorError($this, 'invalid');
    }
 
    return $value;
  }
}