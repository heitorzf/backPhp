<?php
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db("loja");

if (isset($_POST['gravar'])){
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codcategoria      = $_POST['codcategoria'];
    $codtipo  = $_POST['codtipo'];
    $codmarca          = $_POST['codmarca'];
    $cor               = $_POST['cor'];
    $tamanho           = $_POST['tamanho'];
    $preco             = $_POST['preco'];
    $foto1             = $_FILES['foto1'];
    $foto2             = $_FILES['foto2'];
    $diretorio = "fotos/";

    $extensao1 = strtolower(substr($_FILES['foto1']['name'], -4));
    $novo_nome1 = md5(time().$extensao1);
    move_uploaded_file($_FILES['foto1']['tmp_name'], $diretorio.$novo_nome1);

    $extensao2 = strtolower(substr($_FILES['foto2']['name'], -6));
    $novo_nome2 = md5(time().$extensao2);
    move_uploaded_file($_FILES['foto2']['tmp_name'], $diretorio.$novo_nome2);

   $sql = mysql_query("INSERT INTO produto (descricao, cor,tamanho,preco,codcategoria,codtipo,codmarca,foto1,foto2)
                values ('$descricao','$cor','$tamanho','$preco','$codcategoria','$codtipo','$codmarca','$novo_nome1','$novo_nome2')");

  $resultado = mysql_query($sql);
  
if ($resultado)
{echo " Falha ao gravar os dados informados";}
else
{echo " Dados informados cadastrados com sucesso";}
}
if (isset($_POST['excluir']))
{
   $codigo            = $_POST['codigo'];
   $descricao         = $_POST['descricao'];
   $codcategoria      = $_POST['codcategoria'];
   $codtipo           = $_POST['codtipo'];
   $codmarca          = $_POST['codmarca'];
   $cor               = $_POST['cor'];
   $tamanho           = $_POST['tamanho'];
   $preco             = $_POST['preco'];
   

  $sql = "DELETE FROM produto WHERE codigo = '$codigo'";

  $resultado = mysql_query($sql);

  if ($resultado === TRUE)
  {
     echo 'Exclusao realizada com Sucesso';
  }
  else
  {
     echo 'Erro ao excluir dados.';
  }
}

if (isset($_POST['alterar']))
{
   $codigo            = $_POST['codigo'];
   $descricao         = $_POST['descricao'];
   $codcategoria      = $_POST['codcategoria'];
   $codtipo           = $_POST['codtipo'];
   $codmarca          = $_POST['codmarca'];
   $cor               = $_POST['cor'];
   $tamanho           = $_POST['tamanho'];
   $preco             = $_POST['preco'];
   

  $sql = "UPDATE produto SET descricao='$descricao',codtipo='$codtipo',preco='$preco'
          WHERE codigo = '$codigo'";
  $resultado = mysql_query($sql);

  if ($resultado == TRUE)
  {
     echo 'Dados alterados com Sucesso';
  }
  else
  {
     echo 'Erro ao alterar dados.';
  }
}

if (isset($_POST['pesquisar']))
{
   $sql = mysql_query("SELECT codigo,descricao,codcategoria,codtipo,codmarca,cor,tamanho,preco,foto1,foto2 FROM produto");
   
   if (mysql_num_rows($sql) == 0)
         {echo "Desculpe, mas sua pesquisa não retornou resultados.";}
   else
        {
        echo "<b>Produtos Cadastrados:</b><br><br>";
        while ($resultado = mysql_fetch_array($sql))
 	        {
                echo "Codigo         : ".$resultado['codigo']." ";
                echo "Descricao      : ".$resultado['descricao']."<br>";
                echo "Categoria      : ".$resultado['codcategoria']." ";
                echo "Tipo           : ".$resultado['codtipo']." ";
                echo "Marca          : ".$resultado['codmarca']."";  
                echo "Cor            : ".$resultado['cor']."<br>";
                echo "Tamanho        : ".$resultado['tamanho']." ";
                echo "Preco          : ".$resultado['preco']."<br>";
                echo '<img src="fotos/'.$resultado['foto1'].'" height="200" width="200" />'."  ";
                echo '<img src="fotos/'.$resultado['foto2'].'" height="200" width="200" />'."<br><br>  ";
            }
        }
}
?>
