<?php
// requirir a página conexaoModel.php
require_once 'conexaoModel.php';

class CamisetaDAO extends Conexao{

    public function CadastrarCamiseta($nome, $tamanho, $cor, $preco)
    {
       
        // passo: Criar uma variável que receberá o objeto de conexão
        $conexao = parent::retornarConexao();

        // passo: Criar uma variável que receberá o texto do comando SQL que devera ser executado no BD
        $comando_sql = 'insert into camisa
        (nome, tamanho, cor, preco)
        values (?, ?, ?, ?);';

        // passo: Criar um objeto que será configurado e levado no BD para ser executado
        $sql = new PDOStatement();

        // passo: Coloca dentro do objeto $sql a conexão preparada para executar o comando_sql 
        $sql = $conexao->prepare($comando_sql);

        // passo: Verificar se no comando_sql eu tenho ? para ser configurado. Se tiver, configurar o BindValues
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $tamanho);
        $sql->bindValue(3, $cor);
        $sql->bindValue(4, $preco);

        try {

        // passo: executar no BD
            $sql->execute();

            return 1;
        } catch (Exception $ex) {
            
           return -1;
        }
    }

    public function ConsultarCamiseta()
    {
        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT id,
                                nome, tamanho, cor, preco
                        FROM   camisa;';
//executar uma consulta no banco de dados
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }


}