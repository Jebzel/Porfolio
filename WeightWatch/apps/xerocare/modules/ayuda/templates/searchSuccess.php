<?php //slot('ayuda');
    // include_partial('ayuda/lista', array('contenidos' => $contenidos))  ?>
<?php //use_javascript('tabla-img.js');
        //use_stylesheet('tabla-img.css');?>
    <script type="text/javascript">
        <?php if (isset($re)) {?>
            var re = '<?php echo $re;?>';
        <?php } else { ?>
            var re = "4";
        <?php } ?>
       var cli = '<?php  echo $cli;?>';
        var swfA="";
        if (re=="1"){
            swfA="c3.swf";   
        }
        else if (re=="0")  swfA="c4.swf";
     
       
        // alert('valor cli: '+cli);
        if (cli>=3) swfA="c2.swf";

        if ((re=="0") || (re=="1") || (re=="2"))
        {
            $(".panel").slideToggle('slow', function() { });
            $(this).toggleClass("active");
            if (swfA!="c2.swf")
            {
                $('#ayu1').hide();
               
            }
           // alert("/images/swf/"+swfA);
           swfA="/images/swf/"+swfA;
            //swfobject.embedSWF(swfA, "flash", "180", "200", "10.0.0", "/images/swf/expressInstall.swf");
            putSWF(swfA);
        }
    </script>
    <?php
    $entro=0;
    if ($cli>=3)
    { ?>
        <table    width="100%" align="center"><tr><td align="center">
            <tr>
                <td align="center">
                  <table align="center" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td  align="center">
                           <?php echo image_tag('mapa.png', array('alt' => 'Mapa de Sitio'));?>
                             <hr align="center">
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <table align="center"  cellpadding="0" cellspacing="5px">

             <tr><th colspan="2" align="center">Tripticos</th><tr>
            <tr>
               
                <td colspan="2"  align="left"> <a href="<?php echo url_for('contenido/ejercicio')?>">• El ejercicio como tratamiento para la obesidad</a><br>
                  <a href="<?php echo url_for('contenido/consejo')?>">• Consejos de una nutricionista</a><br>
                  <a href="<?php echo url_for('contenido/correcto')?>">• La correcta nutrición del paciente obeso</a><br></td>
            </tr>
            <tr><th></th><td height="10px"></td></tr>
               <tr><th colspan="2"  align="center">Registrar Usuario</th><tr>
            <tr>            
              <td colspan="2"  align="left"><a href="<?php echo url_for('usuarionuevo')?>">• Registrar usuario nuevo</a></td>
            </tr>
             <tr><th></th><td height="10px"></td></tr>
               <tr><th colspan="2"  align="center">Cálculo de IMC</th><tr>
            <tr>
              <td colspan="2"  align="left"><a href="<?php echo url_for('imc')?>">• Cálculo de IMC</a></td>
            </tr>
             <tr><th></th><td height="10px"></td></tr>
             <tr><th colspan="2"  align="center">Sección de Médicos</th><tr>
            <tr>
              <td colspan="2"  align="left"><a href="<?php echo url_for('construccion')?>">• Sección para Médicos (en construcción)</a></td>
            </tr>
            <tr><th></th><td height="10px"></td></tr>
             <tr><th colspan="2"  align="center">Noticias</th><tr>
            <tr>
              <td colspan="2"  align="left"><a href="<?php echo url_for('construccion')?>">• Noticias del programa Xerocare (en construcción)</a></td>
            </tr>
            <tr><th></th><td height="10px"></td></tr>
             <tr><th colspan="2"  align="center">Eventos</th><tr>
            <tr>
              <td colspan="2"  align="left"><a href="<?php echo url_for('construccion')?>">• Información sobre los eventos del programa Xerocare (en construcción)</a></td>
            </tr>

        </table>
        </td>
            </tr></table>
    <?php }
    else if ($resultado=="")
    {
        $k=0;
        $li=$po[0]-1; 
         //echo "<script type=\"text/javascript\">sinResultado();</script>";?>

        <table  cellpadding="0" cellspacing="0" align="center" width="90%">
             <tr>
                <td height="20px">
                </td>
            </tr>
        <?php
        for ($i=0;$i<count($tit);$i++)
        { ?>
            
                <tr>
                    <td width="30px"></td>
                    <td align="left">
                        <?php  echo "<a href=\"".$dir[$i]."\">". htmlspecialchars_decode($tit[$i])."</a>";?>
                    </td>
                </tr>
                <tr><td height="10px" colspan="2"></td></tr>
                <?php
                if ($tit[$i]!='')   $entro=1;
                for ($j=$k;$j<=$li;$j++){?>
                    <tr>
                        <td width="30px"></td>
                        <td>
                            <?php  echo htmlspecialchars_decode($des[$j]);?>
                        </td>
                    </tr>
               <tr><td height="10px" colspan="2"></td></tr>
                <?php }
                $k=$li+1;
                if ($i+1<count($tit)) $li= $k+$po[$i+1]-1; ?>
                <tr><td width="30px"></td><td><a href="<?php echo $dir[$i];?>"><input type="image" src="/images/ver-mas.gif" alt="Ver más"  onClick="location.href='<?php echo $dir[$i];?>'" /> </a>
                </td></tr>
                <tr><td height="20px" colspan="2"></td></tr>
    <?php } ?>

     </table>
    <?php }
    else
    {
        ?><table align="center"  width="100%">
            <tr>
               <table align="center" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td  align="center">
                       <?php echo image_tag('sinresultado.png', array('alt' => 'Sin resultado'));?>
                        
                    </td>
                </tr>
            </table>
            </tr>
        </table>
        <?php 
       
    }
       /* if ($entro==0) echo "Sin resultados"; ?>
    if ($resultado=="")
    {
        $k=0;
        $li=$po[0]-1;
        for ($i=0;$i<count($tit);$i++)
        {
            //echo "<br>inicio ".$k." limite ".$li." y po: ".$po[$i];
            echo "<br><a href=\"".$dir[$i]."\">". htmlspecialchars_decode($tit[$i])."</a>";
            if ($tit[$i]!='')  $entro=1;
            //echo "<br>".$tit[$i+1];
            for ($j=$k;$j<=$li;$j++)
            {
                 echo "<br>".htmlspecialchars_decode($des[$j]);
               //  $entro=1;
            }
            $k=$li+1;
            if ($i+1<count($tit)) $li= $k+$po[$i+1]-1;
        }
        if ($entro==0) echo "Sin resultados";
    }
    else
    {
        echo $resultado;
    }
//end_slot(); ?>
*/
    ?>