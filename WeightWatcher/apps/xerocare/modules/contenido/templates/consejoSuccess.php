<?php slot('title', 'Programa Xerocare - Consejos de una nutricionista'); ?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td  align="center">
           <?php echo image_tag('consejo.png', array('alt' => 'Consejos de una nutricionista '));?>
             <hr align="center">
        </td>
    </tr>
</table>
<table align="center" width="100%" cellpadding="0" cellspacing="2">
    <tr>
            <td  align="center" valign="top" width="40%">
                <p>
                Consumir tres o cuatro raciones de frutas al día es
                muy aconsejable para obtener las vitaminas y
                minerales necesarias que ellas aportan al organismo,
                pero lo ideal es siempre consumirlas enteras y no en
                jugo, pues la fruta triturada pierde mucha de su fibra
                y no sacia el apetito.
                </p>
                <li><p>
                Otra razón por la cual los jugos de frutas no son
                recomendables es porque, aún sin agregarle azúcar,
                suelen ser sumamente calóricos. Por ejemplo, una
                naranja masticada aporta 60 kcal, pero un jugo de
                naranja tiene al menos 4 naranjas, lo cual suma hasta
                240 kcal.
                </p></li>
                <li><p>
                Los jugos y otras bebidas que vienen azucaradas
                como refrescos, té helado, malta, etc, deben ser
                evitados pues en promedio un vaso de estos líquidos
                puede tener el equivalente de 9 bolsitas de azúcar.
                </p></li>
            </td>
            <td valign="top" width="40%">
               <li><p>
                 Aprender acerca de la manera saludable de cocinar
                los alimentos es muy importante para poder bajar de
                peso. Las frituras deben ser evitadas ya que aportan
                una gran cantidad de calorías y aumentan los
                triglicéridos. Es preferible hornear la comida, hacerla
                a la plancha, a la parrilla o guisarla.
               </p></li>
               <li><p>
                 Los frutos secos son muy buenos para el
                organismo pero en pocas cantidades. Los mismos
                aportan una cantidad de grasa saludable, pero si nos
                excedemos pueden contribuir a que aumentemos
                de peso. Diez unidades de maní equivalen a una
                cucharadita de aceite de oliva, y por eso se pueden
                consumir un poco diariamente. Lo importante es
                que sea de manera controlada.
                </p></li>
            </td>
            <td>
                 <?php echo image_tag('fruta.png', array('alt' => 'Frutas'));?>
            </td>
        </tr>
        <tr>
        <td  align="center" valign="top" colspan="3">
            <table width="100%">
                       <tr>
                         <td align="left" colspan="3">
                              <ul><a title="Compártelo al mundo con Twitter!" href="http://twitter.com/home?status=Leyendo%20%27%20Consejos%20de%20una%20nutricionista%27%20%28via%20@xerocare%29%20http://www.xerocare.com.ve/contenido/consejo%20" target="_blank"> <?php echo image_tag('twitter.png', array('alt' => 'Twitter'));?></a>
                                <a href="http://www.facebook.com/sharer.php?u=http://www.xerocare.com.ve/contenido/consejo&amp;t=Consejos%20de%20una%20nutricionista" target="_blank"> <?php echo image_tag('facebook.png', array('alt' => 'Facebook'));?></a>
                            </ul>
                         </td>
                     </tr>
                     <tr>
                         <td align="center" colspan="3" height="30px">
                             <h4>También te interesará:</h4>
                         </td>
                     </tr>
                     <tr>
                         <td>
                              <a href="<?php echo url_for('contenido/correcto')?>">La correcta nutrición del paciente obeso</a>
                         </td>

                         <td>
                             <a href="<?php echo url_for('contenido/ejercicio')?>">El ejercicio como tratamiento para la obesidad</a>
                         </td>

                         <td>
                            <a href="<?php echo url_for('contenido/inicio')?>">Volver a información de los Tripticos</a>
                         </td>
                     </tr>
                 </table>
            </td>

    </tr>
</table>



