<?php 

class ContaBanco
{
	public $numConta; 	// Número da Conta
	protected $tipo;	// Tipo da Conta, se é CC ou CP
	private $dono;		// Nome do Dono da Conta
	private $saldo;		// Saldo da conta
	private $status;	// Status, se aberto(true) ou fechado (false)

	public function getNumConta(){
		return $this->numConta;
	}
	public function setNumConta($num){
		$this->numConta = $num;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function getDono(){
		return $this->dono;
	}
	public function setDono($dono){
		$this->dono = $dono;
	}
	public function getSaldo(){
		return $this->saldo;
	}
	public function setSaldo($saldo){
		$this->saldo = $saldo;
	}
	public function getStatus(){
		return $this->status;
	}
	public function setStatus($status){
		$this->status = $status;
	}

	public function abrirConta($tipo,$dono){
		
		$this->setDono($dono);
		$this->setNumConta(rand(10,50));

		if ($tipo == 'CC') {
			$this->setTipo('CC');
			$this->setSaldo(50);
			
		} else if ($tipo == 'CP'){
			$this->setTipo('CP');
			$this->setSaldo(150);

		} else {
			echo 'Tipo Inválido';
		}

		$this->setStatus(true);
	}

	public function fecharConta(){
		if ($this->getStatus()) {
			if ($this->getSaldo() > 0) {
				echo "Você possui {$this->getSaldo()} e precisa tirar o dinheiro";
			} else if ($this->getSaldo() < 0) {
				echo "Há pendências financeiras";
			} else {
				$this->setStatus(false);
			}
		} else {
			echo "Conta Já está fechada";
		}
	}

	public function sacar($valor){

		if ($this->getStatus()) {
			if ($this->getSaldo() >= $valor) {
				$novoSaldo = $this->getSaldo() - $valor;
				$this->setSaldo($novoSaldo);
			} else {
				echo "Saldo Insuficiente";
			}
		} else {
			echo "Conta está fechada";
		}
	}


}

echo "<pre>";

$cp1 = new ContaBanco();
print_r($cp1);
$cp1->abrirConta('CP','Maria');
print_r($cp1);
$cp1->fecharConta();
print_r($cp1);
$cp1->sacar(150);
$cp1->fecharConta();
print_r($cp1);

echo "<hr>";

$cc1 = new ContaBanco();
$cc1->abrirConta('CC','João');
print_r($cc1);




