<?php
    abstract class VeiculoAbstrata{
        protected $codigo_veiculo;
        protected $nome;
        protected $marca;
        protected $modelo;

        protected $ano;

        protected $cor;

        protected $quilometragem;

        abstract public function Veiculo_Cadastro($cod, $array_parametros);

        abstract public function Veiculo_Alteracao($cod, $array_parametros);

        abstract public function Veiculo_Exclusao($cod);



    }

    abstract class ClienteAbstrata{
        protected $codigo_cliente;
        protected $nome;
        protected $endereco;
        protected $email;
        protected $telefone;
        protected $celular;
        abstract public function Cliente_Aluga_Veiculo($cod, $array_parametros);
        abstract public function Cliente_Devolve_Veiculo($cod, $array_parametros);
        abstract public function Cliente_Reserva_Carro($cod,$array_parametros);


    }

    //Implementação da Classe Veiculo

    Class Veiculo extends VeiculoAbstrata{
        public function Veiculo_Cadastro($cod, $array_parametros){
            echo "Dados para Cadastro do Veiculo $cod: <br>";
            foreach($array_parametros as $campo)
                    echo $campo. "<br>";
            
        }
    	/**
         * 
	 * @param mixed $cod
	 * @param mixed $array_parametros
	 * @return mixed
	 */

	public function Veiculo_Alteracao($cod, $array_parametros) {
        echo "Dados para Alteração do Veiculo: $cod";

        foreach($array_parametros as $campo)
                echo $campo. "<br>";
	}
	
	/**
	 *
	 * @param mixed $cod
	 * @return mixed
	 */
	public function Veiculo_Exclusao($cod) {
        echo "Exclusão de Veiculo";
	}
}

//Implementação da Classe Cliente

class cliente extends ClienteAbstrata{
    public function Cliente_Aluga_Veiculo($cod, $array_parametros){
        $codigoVeiculo = $array_parametros[0];
        $dataAluguel = $array_parametros[1];
        $periodo = $array_parametros[2];
        $valor = $array_parametros[3];

        echo "O Cliente de Codigo $cod irá alugar o veiculo $codigoVeiculo a partir de $dataAluguel.";
    }
	/**
	 * @param mixed $cod
	 * @param mixed $array_parametros
	 * @return mixed
	 */
	public function Cliente_Devolve_Veiculo($cod, $array_parametros) {
        $codigoVeiculo = $array_parametros[0];
        $dataaluguel = $array_parametros[1];
        echo "O cliente devolveu o Carro";

	}
	
	/**
	 *
	 * @param mixed $cod
	 * @param mixed $array_parametros
	 * @return mixed
	 */
	public function Cliente_Reserva_Carro($cod, $array_parametros) {

        $codigoVeiculo = $array_parametros;
        $dataAluguel = $array_parametros;

        echo "O cliente de código $cod irá alugar o veiculo $codigoVeiculo, alugado para o dia $dataAluguel";

	}

    public function Cliente_Exclusao($cod){
        echo "Exclusão do Cliente de código $cod";
    }


}

class PessoaFisica extends Cliente{
    private $cpf;
    private $rg;

    private $data_nascimento;

    private function testaCPF($cpf){
        //Implementar código de Teste do CPF
    }
    public function Cadastro($cod, $array_parametros){
        echo "Dados para cadastro do cliente (Pessoa Fisica) de código $cod: <br>";

        foreach($array_parametros as $campo)
            echo $campo ."<br>";
        
    }

    public function Alteracao($cod, $array_parametros){
        echo "Dados para alteração do cliente (pessoa fisica) de código $cod: <br>";
        foreach($array_parametros as $campo)
                echo $campo. "<br>";
    }




}

class PessoaJuridica extends cliente{
    private $cnpj;
    private $inscricao_estudual;
    private $data_de_fundacao;
    private $pessoa_responsavel;
    private $website;

    private function testaCnpj($cnpj){
        //Implementar aqui Algoritmo de Verificação do CNPJ
    }

    public function Cadastro($cod, $array_parametros){
        echo "Cadastro de Pessoa Juridica de código $cod: <br>";
    }

    public function Alteracao($cod, $array_parametros){
        echo "Dados para alteração do cliente pessoa juridica: $cod";
        foreach($array_parametros as $campo)
                echo $campo."<br>";
    }




}

// Programa Princpal

$dadosVeiculo = array('Palio', 'FIAT', 'ELX', '2005', 'Prata','3500');
$objVeiculo = new Veiculo;
$objVeiculo -> Veiculo_Cadastro("1", $dadosVeiculo);



$dadosCliente = array("Pedro", "Rua Pereira 52", "Pedro@pedro.com", "313131131", "98654343232", "30/05/1980");

echo "<hr>";
$objCliente = new PessoaFisica;



$objCliente -> Cadastro("1", $dadosCliente);

echo "<hr>"



?>