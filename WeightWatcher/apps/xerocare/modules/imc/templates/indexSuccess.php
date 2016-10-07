<?php slot('title', 'Cálculo de IMC'); ?>
 <table align="center" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td  align="center">
           <?php echo image_tag('imc.png', array('alt' => 'Calculo de IMC'));?>
             <hr align="center"><?php echo $form['_csrf_token']->render()?>
        </td>
    </tr>
 </table>
<?php // use_javascript('tabla-img.js');
 use_stylesheet('tabla-img.css');
 //include_component("imc", array('mitotal' => $peso));?>
  <?php
  if ($sf_params->get('peso')){
      $form->setDefault('peso',$sf_params->get('peso'));
      $form->setDefault('gramo',$sf_params->get('gr'));
      $form->setDefault('estatura',$sf_params->get('est'));
      $form->setDefault('centimetro',$sf_params->get('cm'));
      $imc = $sf_params->get('imc');
      if ($sf_params->get('tipo')==1) $tipo='Normal';
      elseif ($sf_params->get('tipo')==2) $tipo='Sobrepeso';
      elseif ($sf_params->get('tipo')==3) $tipo='Obesidad tipo 1';
      else $tipo='Obesidad tipo 2';
  }
  ?>
 
<form  action="<?php echo url_for('@proImc')?>" name="imc" method="post">
  <table width="100%" align="center" >
         <tr><td align="center">
    <table width="80%" align="center" >
         <tr><td colspan="2"><p>El Índice de Masa Corporal es un índice del peso de una persona en relación con su altura. A pesar de que no hace distinción entre los componentes grasos y no grasos de la masa corporal total, éste es el método más práctico para evaluar el grado de riesgo asociado con la obesidad.</p></td></tr>

        <tr><td width="40%"> <img src="/images/cintura.png" alt="cintura"/></td>
        
            <td align="left"  valign="middle" >
                <table  id="tablaR2" >
                    <thead>
                        <tr>
                            <th scope="col" valign="middle" class="rounded-company" width="20%">Estatura</th>
                            <td scope="col" valign="middle" >  <?php echo $form['estatura']->render(); ?> metro(s)</td>
                            <td  scope="col" valign="middle" > con <?php echo $form['centimetro']->render();  ?>centímetro(s)</td>
                            <td  scope="col"  valign="middle"  class="rounded-q4"> </td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                          <th class="rounded-foot-left" valign="middle" >Peso</th>
                          <td valign="middle" ><?php  echo $form['peso']->render();  ?> kilos</td>
                          <td  valign="middle" >con <?php  echo $form['gramo']->render();  ?>gramos </td>
                            <td class="rounded-foot-right" valign="middle" > </td>
                        </tr>
                    </tfoot>
               </table>
            </td>
        </tr>
 <?php if (isset($imc)) {?>
        <tr>
            <td colspan="2" align="center">
               <table align="center">
                  <tr>
                      <td>Tu IMC es de <font color="#4d5ba1"><b><?php echo $imc?></b></font> y tienes un rango: <font color="#4d5ba1"><b><?php echo $tipo?></b></font></td>
                  </tr>
               </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <table  id="tablaR2" align="center" cellpadding="0" cellspacing="0">
                  <thead>
                     <tr>
                         <td  scope="col" class="rounded-company"> 
                             • Un resultado comprendido entre 18 y 25 está catalogado como <strong>saludable</strong>.
                         </td>
                         <td  scope="col" class="rounded-q4"></td>
                     </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td scope="col" colspan="2">
                              • Un IMC por debajo de 18,5 indica <strong>delgadez</strong>, <strong>malnutrición</strong> o algún <strong>problema de salud</strong>.
                          </td>                         
                      </tr>
                      <tr>
                          <td scope="col" colspan="2">
                              • Un IMC superior a 25 indica <strong>sobrepeso</strong>.
                          </td>                          
                      </tr>
                  </tbody>
                  <tfoot>
                     <tr>
                      <td  scope="col" class="rounded-foot-left">
                          • Un IMC de 30 indica <strong>obesidad leve</strong>, y por encima de 40 hay <strong>obesidad mórbida</strong> que puede requerir una operación quirúrgica.
                      </td>
                      <td scope="col" class="rounded-foot-right"></td>
                    </tr>
                  </tfoot>
                </table>
            </td>
        </tr>
    <?php } ?>
        <tr>
            <td colspan="2" align="center">
               <table align="center">
                  <tr>
                    <td align="center">
                        <input type="submit" class="small blue awesome" value="Calcular" />
                    </td>
                  </tr>
               </table>
            </td>
        </tr>
    </table>
       </td>
        </tr>
    </table>
</form>

