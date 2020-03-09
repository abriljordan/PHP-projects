<?php require_once('../../includes/initialize.php');?>
<?php
require('fpdf.php');

$html = <<<MYTABLE
  <table border="1" align="center">
    <tr>
      <td rowspan="2" valign="middle" border="0">rowspan=2, valign=middle</td>
      <td>Normal</td>
      <td>Normal</td>
      <td>Normal</td>
      <td colspan="2" rowspan="2" valign="bottom" bgcolor="#FF00FF">colspan=2<br>rowspan=2<br>valign=bottom</td>
    </tr>
    <tr>
      <td height="15">Normal</td>
      <td rowspan="2" align="right" bgcolor="#aaaaaa" border="0">rowspan=2</td>
      <td border="0">border=0</td>
    </tr>
    <tr>
      <td>Normal</td>
      <td>Normal</td>
      <td>Normal</td>
      <td rowspan="3" valign="top" bgcolor="#CC3366">rowspan=3</td>
      <td>Normal</td>
    </tr>
    <tr bgcolor="#cccccc">
      <td>Normal</td>
      <td colspan="3" align="center">align center, colspan=3</td>
      <td>Normal</td>
    </tr>
    <tr>
      <td align="right" valign="bottom">align=right<br>valign=bottom</td>
      <td>Normal</td>
      <td>&nbsp;</td>
      <td>Normal</td>
      <td height="20">height=20</td>
    </tr>
  </table>
MYTABLE;
define('FPDF_FONTPATH','font/');
require('pdftable.inc.php');
$p = new PDFTable();
$p->AddPage();
$p->setfont('times','',12);
$p->htmltable($html);
$p->output('','I');
?>