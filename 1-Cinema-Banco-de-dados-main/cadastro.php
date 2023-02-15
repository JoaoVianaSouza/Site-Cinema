<?php
  $oper = $_GET['op'];

  //inclusao
   if($oper == 1) {
      $entrada = $_GET['entrada'];
      if($entrada == 1) {
            echo"
            <html>
                <head>
                <meta charset='UTF-8'>
                <link rel='stylesheet' href='style2.css'>
                <link rel='shortcut icon' href='favicon2.ico' type='image/x-icon'>
                <title>Adquirir Ingressos</title>
                </head>
                <body>
                    <h1 class='main'>Adquirir Ingressos</h1>
                    <fieldset class='border'>
                        <div class='form'>
                            <form action='cadastro.php'  method='GET'>
                                Nome:  <input type='text' class='text'  placeholder='Nome'  name='nome'><br>
                                CPF:  <input type='number' class='number' placeholder='CPF' name='cpf'><br>
                                Data de Nascimento: <input type='date' class='date' name='data_nascimento'><br> 
                                <div class='form_radio1'>
                                    Sexo:                   
                                        <input type='radio' id='sexo' class='radio1' name='sexo' value='Masculino'>
                                        <label for='masculino'>Masculino</label>
                                        <input type='radio' id='sexo' class='radio1' name='sexo' value='Feminino'>
                                        <label for='feminino'>Feminino</label>
                                        <input type='radio' id='sexo' class='radio1' name='sexo' value='Não informado'>
                                        <label for='nao_informar'>Não informado</label><br>
                                </div>
                                <div class='form_radio2'>
                                    Filme: 
                                        <input type='radio' id='filme' class='radio2' name='filme' value='Que horas ela volta?'>
                                        <label for='Que horas ela volta?'>Que horas ela volta?</label>
                                        <input type='radio' id='filme' class='radio2' name='filme' value='Adoráveis Mulheres'>
                                        <label for='Adoráveis Mulheres'>Adoráveis Mulheres</label> <br>
                                        <input type='radio' id='filme' class='radiox' name='filme' value='Capitã Marvel'>
                                        <label for='Capitã Marvel'>Capitã Marvel</label>
                                        <input type='radio' id='filme' class='radio2' name='filme' value='Estrelas além do tempo'>
                                        <label for='Estrelas além do tempo'>Estrelas além do tempo</label><br> 
                                </div>
                                <div class='form_radio3'>
                                    Sessão: 
                                        <input type='radio' id='sessao' class='radio3' name='sessao' value='14:00'>
                                        <label for='14:00'>14:00</label>
                                        <input type='radio' id='sessao' class='radio3' name='sessao' value='17:00'>
                                        <label for='17:00'>17:00</label>
                                        <input type='radio' id='sessao' class='radio3' name='sessao' value='19:00'>
                                        <label for='19:00'>19:00</label><br>
                                </div>
                                <div class='form_radio4'>
                                    Tipo de Ingresso: 
                                        <input type='radio' id='ingresso1' class='radio4' name='tipo_ingresso' value='Meia'>
                                        <label for='meia'>Meia</label>
                                        <input type='radio' id='ingresso2' class='radio4' name='tipo_ingresso' value='inteira'>
                                        <label for='inteira'>Inteira</label>
                                        <input type='radio' id='ingresso3' class='radio4' name='tipo_ingresso' value='Promoção' checked>
                                        <label for='promoção'>Ação Outubro Rosa</label> <br> <br>
                                </div>
                                <div class='roomX'>
                                    Nesta promoção, nós disponibilizamos salas exclusivas para cada filme. Ao chegar no cinema, basta apresentar o QRcode do 
                                    ingresso que o atendente irá te dizer qual será sua sala. <br> <br>
                                <input type=hidden name=op value= $oper>    
                                <input type=hidden name='entrada' value=2> 
                                <input type=submit class='button' value='Comprar'> 
                                <input type=reset class='button'  value='Limpar'> 
                                <a href='inicial.html'><input type='button' class='button' value='Voltar'></a> 
                            </form>
                        </div>
                    </fieldset>       
                </body>
            </html>
            ";
        }

        //inclusao
        if($entrada == 2) {
            $nom = $_GET['nome'];
            $cpf = $_GET['cpf'];
            $sex = $_GET['sexo'];
            $nasc = $_GET['data_nascimento'];
            $film = $_GET['filme'];
            $ses = $_GET['sessao'];
            $ting = $_GET['tipo_ingresso'];

            //montando instrução sql
            $sql = "insert into clientes values('$nom','$sex','$nasc','$film','$ses', '$ting', '$cpf')";
            //estabelecendo a conexão com o banco de dados
            $conn = mysqli_connect("127.0.0.1","root","","cinema");
            //aplico o sql na conexão e status tem o retorno
            $status = mysqli_query($conn, $sql);
            if($status = true) {
            echo"
            <link rel='shortcut icon' href='favicon1.ico' type='image/x-icon'>
            Tudo OK, ingresso comprado !!!<hr>";
            echo"<a href=inicial.html> voltar </a> <br>";
            } else {
            echo" 
            <link rel='shortcut icon' href='favicon1.ico' type='image/x-icon'>
            Houve um erro no seu cadastro!<hr>";
            echo" <a href=inicial.html> voltar </a>";
            }
        }
    }

    //pesquisar
    if($oper == 2){
        $entrada = $_GET['entrada'];
        if($entrada == 1) {
            echo"
            <html>
                <head>
                    <meta charset='UTF-8'>
                    <link rel='stylesheet' href='style2.css'>
                    <link rel='shortcut icon' href='favicon4.ico' type='image/x-icon'>
                    <title>Meus Ingressos</title>
                </head>
                <body>
                    <h1 class='main'>Meu Ingresso</h1>
                    <fieldset class='border'>
                        <form action='cadastro.php'  method='GET'>      
                            Digite seu CPF:
                            <input type='number' name='cpf' class='number1' placeholder='CPF'><BR>
                            <input type=hidden name=op value= $oper>    
                            <input type=hidden name='entrada' class='button' value=2> <br>
                            <input type=submit value='Pesquisar' class='button'>
                            <a href='inicial.html'><input type='button' value='Voltar' class='button' ></a>
                        </form>
                    </fieldset>        
                </body>
            </html>
            ";
        }

        if ($entrada == 2){
            $cpf = $_GET['cpf'];

            //montando o sql
            $sql = "select * from clientes where cpf = $cpf";
            //estabelecendo a conexão com o banco de dados
            $conn = mysqli_connect("127.0.0.1","root","","cinema");
            //aplico o sql na conexão e status tem o retorno
            $dados = mysqli_query($conn, $sql);
            //quero saber a quantidade de registro que contem $dados
            $quantidade = mysqli_num_rows($dados);
        
            if($quantidade > 0 ){
            //pegando o primeiro registro de $dados
            $linha = mysqli_fetch_array($dados);
            //exibindo os dados
            $nom = $linha['nome'];
            $cpf = $linha['cpf'];
            $sex = $linha['sexo'];
            $nasc = $linha['data_nascimento'];
            $film = $linha['filme'];
            $ses = $linha['sessao'];
            $ting = $linha['tipo_ingresso'];
            $nun1 = rand(1,10);
            
            echo "
                <html>
                    <head>
                        <meta charset='UTF-8'>
                        <link rel='stylesheet' href='style2.css'>
                        <link rel='shortcut icon' href='favicon4.ico' type='image/x-icon'>
                        <title>Meus Ingressos</title>
                    </head>
                    <body>
                        <fieldset class='border2'>
                            <h1 class='main'>Meu Ingresso</h1>
                            <fieldset class='border1'>
                                <ul class='ing'> 
                                    <li> <h3>Nome: $nom </h3> </li> 
                                    <li> <h3>CPF: $cpf </h3> </li>    
                                    <li> <h3>Sexo: $sex </h3> </li>    
                                    <li> <h3>Nascimento: $nasc </h3> </li>    
                                    <li> <h3>Filme: $film </h3> </li> 
                                    <li> <h3>Sessão: $ses </h3> </li> 
                                    <li> <h3>Tipo de Ingresso: $ting </h3></li>
                                </ul>
                                <img src='qrcode.png' alt='qrcode' id='qr'> <br>
                                <div class='room'>
                                    Sala $nun1
                                </div>    
                            </fieldset> <br>
                            <a href='inicial.html'><input type='button' value='Voltar' class='buttonW' ></a>
                        </fieldset>         
                    </body>
                </html>
            ";    
            }  else {
            echo "  <link rel='shortcut icon' href='favicon1.ico' type='image/x-icon'>
                    Ingresso não Encontrado
                    <hr>
                    <a href=inicial.html> voltar </a>        
            ";
            }
        }   
    } 
    //Listar
    if($oper == 3){

        //montando o sql
        $sql = "select * from clientes";
        //estabelecendo a conexão com o banco de dados
        $conn = mysqli_connect("127.0.0.1","root","","cinema");
        //aplico o sql na conexão e status tem o retorno
        $dados = mysqli_query($conn, $sql);
        //quero saber a quantidade de registro que contem $dados
        $quantidade = mysqli_num_rows($dados);

        if($quantidade > 0){
            //pegando o primeiro refistro de $dados
            $linha = mysqli_fetch_array($dados);
            echo"
                <html>
                    <head>
                        <meta charset='UTF-8'>
                        <link rel='stylesheet' href='style2.css'>
                        <link rel='shortcut icon' href='favicon5.ico' type='image/x-icon'>
                        <title>Mural Solidário</title>
                    </head>
                    <body>
                        <h1 class='mural'> Mural Solidário </h1>
                        <p class='legendMural'>Mural destinado à homenagear os clientes que estão contribuindo para a ação do outubro rosa.
                        <fieldset class='form_solidário'>
                            <table border='1' class='tabela1'>
                                <tr>
                                    <th>Nome</th>
                                    <th class='sex'>Sexo</th>
                                    <th>Filme</th>
                                    <th>Sessão</th>
                                    <th>Tipo de Ingresso</th>
                                </tr>
            ";

            for( $i=0 ; $i<$quantidade ; $i++){
                //exibindo dados
                $nom = $linha['nome'];
                $sex = $linha['sexo'];
                $nasc = $linha['data_nascimento'];
                $film = $linha['filme'];
                $ses = $linha['sessao'];
                $ting = $linha['tipo_ingresso'];
                $cpf = $linha['cpf'];

                echo"
                    <tr>
                        <td>$nom</td>
                        <td>$sex</td>
                        <td>$film</td>
                        <td>$ses</td>
                        <td>$ting</td>
                    </tr> 
                ";
                $linha = mysqli_fetch_assoc($dados);
            } //fim do loop

            echo"
                            </table>
                        </fieldset>
                        <a href='inicial.html'><input type='button' value='Voltar' class='buttonX' ></a>
                    </body>
                <html>
            ";
        } else{
            echo "
                <link rel='shortcut icon' href='favicon1.ico' type='image/x-icon'>
                Mural Solidário não Encontrado, nenhum cliente cadastrado
                <hr>
                <a href=inicial.html> voltar </a>     
            ";
        }
    }

    //excluir
    if($oper ==4){
        $entrada = $_GET['entrada'];
        if($entrada == 1) {
            echo"
            <html>
                <head>
                    <meta charset='UTF-8'>
                    <link rel='stylesheet' href='style2.css'>
                    <link rel='shortcut icon' href='favicon6.ico' type='image/x-icon'>
                    <title>Excluir Ingressos</title>
                </head>
                <body>
                    <h1 class='main'>Meu Ingresso</h1>
                    <fieldset class='border'>
                        <form action='cadastro.php'  method='GET'>      
                            Digite seu CPF:
                            <input type='number' name='cpf' class='number1' placeholder='CPF'><BR>
                            <input type=hidden name=op value= $oper>    
                            <input type=hidden name='entrada' class='button' value=2> <br>
                            <input type=submit value='Buscar' class='button'>
                            <a href='inicial.html'><input type='button' value='Voltar' class='button' ></a>
                        </form>
                    </fieldset>        
                </body>
        </html>
        ";
        }
        if ($entrada == 2){
            $cpf = $_GET['cpf'];
            //montando o sql
            $sql = "select * from clientes where cpf = $cpf";
            //estabelecendo a conexão com o banco de dados
            $conn = mysqli_connect("127.0.0.1","root","","cinema");
            //aplico o sql na conexão e status tem o retorno
            $dados = mysqli_query($conn, $sql);
            //quero saber a quantidade de registro que contem $dados
            $quantidade = mysqli_num_rows($dados);
        
            if($quantidade > 0 ){
            //pegando o primeiro registro de $dados
            $linha = mysqli_fetch_array($dados);
            //exibindo os dados
            $nom = $linha['nome'];
            $sex = $linha['sexo'];
            $nasc = $linha['data_nascimento'];
            $film = $linha['filme'];
            $ses = $linha['sessao'];
            $ting = $linha['tipo_ingresso'];
            $cpf = $linha['cpf'];
            echo "
                <html>
                    <head>
                        <meta charset='UTF-8'>
                        <link rel='stylesheet' href='style2.css'>
                        <link rel='shortcut icon' href='favicon6.ico' type='image/x-icon'>
                        <title>Excluir Ingressos</title>
                    </head>
                    <body>
                        <fieldset class='border3'>
                            <h1 class='main4'>Tela de Exclusão</h1>
                            <fieldset class='border1'>    
                                <form action='cadastro.php' method='GET'>
                                    <h3> Nome: </h3> $nom <br>     
                                    <h3> CPF: </h3> $cpf <br>
                                    <h3> Sexo: </h3> $sex <br>   
                                    <h3> Data de Nascimento: </h3> $nasc <br>
                                    <h3> Filme: </h3> $film <br>
                                    <h3> Sessão: </h3> $ses <br>
                                    <h3> Tipo de ingresso: </h3> $ting <br>
                                    <h4>Deseja Excluir? <input type=radio name=escolha value=1> Sim
                                                        <input type=radio name=escolha value=2> Não </h4>
                                    <input type=hidden name=cpf value=$cpf>
                                    <input type=hidden name=op value=$oper>
                                    <input type=hidden name='entrada' value=3> <br>
                            </fieldset>
                                <input type=submit value=Enviar class='buttonW'>
                                </form>
                        </fieldset>
                    </body>
                </html>
            ";    
        }  else {
            echo " <link rel='shortcut icon' href='favicon1.ico' type='image/x-icon'>
                    Cliente não Encontrado
                   <hr> <a href=inicial.html> voltar </a>        
            ";
            }   
        }

        if($entrada==3){
        $cpf = $_GET['cpf'];
        $escolha = $_GET['escolha'];
        if($escolha==2){
            echo" <link rel='shortcut icon' href='favicon1.ico' type='image/x-icon'>
            Exclusão cancelada. <br>";
            echo" <hr> <a href='inicial.html'> voltar </a>";
            exit();
        }
        //montando o sql
        $sql = "delete from clientes where cpf = $cpf";
        //estabelecendo a conexão com o banco de dados
        $conn = mysqli_connect("127.0.0.1","root","","cinema");
        //aplico o sql na conexão e status tem o retorno
        $status = mysqli_query($conn, $sql);        
        if($status = true) {
            echo" <link rel='shortcut icon' href='favicon1.ico' type='image/x-icon'>
            Tudo OK, excluído com sucesso !!! <br>";
            echo" <hr> <a href=inicial.html> voltar </a>";
        }
        else{
            echo"<link rel='shortcut icon' href='favicon1.ico' type='image/x-icon'>
            Erro. <br>";
            echo" <hr> <a href='inicial.html'> voltar </a>";  
            } 
        }
    }
    //alterar
    if($oper == 5){
        $entrada = $_GET['entrada'];
        if($entrada == 1) {
            echo"
            <html>
                <head>
                    <meta charset='UTF-8'>
                    <link rel='stylesheet' href='style2.css'>
                    <link rel='shortcut icon' href='favicon3.ico' type='image/x-icon'>
                    <title>Alterar Ingressos</title>
                </head>
                <body>
                    <h1 class='main'>Meu Ingresso</h1>
                    <fieldset class='border'>
                        <form action='cadastro.php'  method='GET'>      
                            Digite seu CPF:
                            <input type='number' name='cpf' class='number1' placeholder='CPF'><BR>
                            <input type=hidden name=op value= $oper>    
                            <input type=hidden name='entrada' class='button' value=2> <br>
                            <input type=submit value='Buscar' class='button'>
                            <a href='inicial.html'><input type='button' value='Voltar' class='button' ></a>
                        </form>
                    </fieldset>        
                </body>
            </html>
        ";
        }
    
        if ($entrada == 2){
        $cpf = $_GET['cpf'];

            //montando o sql
            $sql = "select * from clientes where cpf = $cpf";
            //estabelecendo a conexão com o banco de dados
            $conn = mysqli_connect("127.0.0.1","root","","cinema");
            //aplico o sql na conexão e status tem o retorno
            $dados = mysqli_query($conn, $sql);
            //quero saber a quantidade de registro que contem $dados
            $quantidade = mysqli_num_rows($dados);
        
            if($quantidade > 0 ){
            //pegando o primeiro registro de $dados
            $linha = mysqli_fetch_array($dados);
            //exibindo os dados
            $nom = $linha['nome'];
            $sex = $linha['sexo'];
            $nasc = $linha['data_nascimento'];
            $film = $linha['filme'];
            $ses = $linha['sessao'];
            $ting = $linha['tipo_ingresso'];
            $cpf = $linha['cpf'];
            echo "
                <html>
                    <head>
                        <meta charset='UTF-8'>
                        <link rel='stylesheet' href='style2.css'>
                        <link rel='shortcut icon' href='favicon3.ico' type='image/x-icon'>
                        <title>Alterar Ingressos</title>
                    </head>
                    <body>
                        <fieldset class='border2'>
                            <h1 class='main3'>Alteração de Ingresso</h1>
                            <fieldset class='border1'> 
                                <form action='cadastro.php' method='GET' class='altere'>  
                                    <h3>CPF: </h3> $cpf <br>      
                                    <h3>Nome: </h3>  <input type=text name=nome value='$nom'> <br>     
                                    <h3>Sexo: </h3>  <select for='sexo' name='sexo' value='$sex'>
                                                        <option value='Masculino'> Masculino </option>
                                                        <option value='Feminino'> Feminino </option>
                                                        <option value='Outros'> Outros </option>
                                                    </select>  <br>   
                                    <h3>Data de Nascimento: </h3>  <input type=date name=data_nascimento value='$nasc'> <br>
                                    <h3>Filme: </h3>  <select for='filme' name='filme' value='$film'>
                                                        <option value='Estrelas além do tempo'> Estrelas além do tempo </option>
                                                        <option value='Adoráveis mulheres'> Adoráveis mulheres </option>
                                                        <option value='Que horas ela volta?'> Que horas ela volta?  </option>
                                                        <option value='Capitã Marvel'> Capitã Marvel </option>
                                                    </select>  <br>   
                                    <h3>Sessão: </h3> <select for='sessao' name='sessao' value='$ses'>
                                                        <option value='14:00'> 14:00 </option>
                                                        <option value='17:00'> 17:00 </option>
                                                        <option value='19:00'> 19:00 </option>
                                                      </select>  <br>   
                                    <h3>Tipo de ingresso: </h3> <select for='tipo_ingresso' name='tipo_ingresso' value='$ting'>
                                                            <option value='Inteira'> Inteira </option>
                                                            <option value='Meia'> Meia </option>
                                                            <option value='Promoção Outubro Rosa'> Promoção Outubro Rosa </option>
                                                          </select>  <br>   
                                    <input type=hidden name=cpf value=$cpf>
                                    <input type=hidden name=op value=$oper>
                                    <input type=hidden name=entrada value=3> <br>     
                            </fieldset>
                            <input type=submit value=Enviar class='buttonW'>
                            </form>
                        </fieldset>
                    </body>
                </html>
            ";
        }    
        else {
            echo "<link rel='shortcut icon' href='favicon1.ico' type='image/x-icon'>
                Cliente não Encontrado
                <hr> <a href=inicial.html> voltar </a>                
        ";
            }
        }
        if ($entrada == 3){
            $nom = $_GET['nome'];
            $sex = $_GET['sexo'];
            $nasc = $_GET['data_nascimento'];
            $film = $_GET['filme'];
            $ses = $_GET['sessao'];
            $ting = $_GET['tipo_ingresso'];
            $cpf = $_GET['cpf'];

            //montando o sql
            $sql = "update clientes set nome='$nom', sexo='$sex', data_nascimento='$nasc', filme='$film', sessao='$ses', tipo_ingresso='$ting' where cpf = $cpf";
            //estabelecendo a conexão com o banco de dados
            $conn = mysqli_connect("127.0.0.1","root","","cinema");
            //aplico o sql na conexão e status tem o retorno
            $status = mysqli_query($conn, $sql);
        
            if($status=true){
                echo"<link rel='shortcut icon' href='favicon1.ico' type='image/x-icon'>
                     Alteração concluída com sucesso. <br>";
                echo"
                     <hr> <a href=inicial.html> Voltar </a>";
            }
            else{
                echo"<link rel='shortcut icon' href='favicon1.ico' type='image/x-icon'>
                     Erro detectado, verifique o seu banco de dados. <br>";
                echo" <hr> <a href='inicial.html'> voltar </a>";  
            } 
        }
    }
?>