<?php
	class hillcipher{
		
		function __construct(){
		}
		
		function alpa(){
			return "abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+-={}[]|:;<>/ ";
		}
		
		function key(){
			return "dfre";
		}
		
		function getIdx($huruf){
		  // $alpa = "abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+-={}[]|:;<>/ ";
		  $idx = -1;
		  for($i=0;$i<strlen($this->alpa());$i++){
		    if(strtolower($huruf)==strtolower($this->alpa()[$i])){
		      $idx = $i;
		    }
		  }
		  return $idx;
		}
		
		function generate_key($key){
		  $matrix = array(array());
		  $ih=0;
		  for($i=0;$i<2;$i++){
		    for($j=0;$j<2;$j++){
		      $matrix[$i][$j] = $this->getIdx(str_split($key)[$ih]);
		      $ih+=1;
		    }
		  }
		  return $matrix;
		}
		
		function msgVector($msg){
		  $vector = array();
		  for($i=0;$i<2;$i++){
		    $vector[$i] = $this->getIdx(str_split($msg)[$i]);
		  }
		  return $vector;
		}

		function modNegative($num, $mod){
			return ($mod + ($num % $mod)) % $mod;
		}

		function modulo($tmpDet,$alpa){
			$tmpMod = $tmpDet > 0 ? $tmpDet%strlen($alpa) : $this->modNegative($tmpDet,strlen($alpa));
			return $tmpMod;
		}

		function encrypt($msg){
			$cipher_text = "";
			$key_matrix = $this->generate_key($this->key());
			$all_msg = str_split($msg);
			$ih = 0;

			while ($ih < count($all_msg)) {
				if($ih+2 > count($all_msg)){
					array_push($all_msg, "x");
				}else{
					$plain_vector = $this->msgVector($all_msg[$ih].$all_msg[$ih+1]);
					$ih+=2;
					$multipication = array();
					for($i=0;$i<2;$i++){
					  $sum = 0;
					  for($j=0;$j<2;$j++){
					    $sum+= ($key_matrix[$i][$j] * $plain_vector[$j]);
					  }
					  $sum%=strlen($this->alpa());
					  $cipher_text.=str_split($this->alpa())[$sum%(strlen($this->alpa())+1)];
					  $multipication[$i] = $sum%(strlen($this->alpa())+1);
					}
				}
			}
			return $cipher_text;
		}

		function decrypt($cipher){
			$key_matrix = $this->generate_key($this->key());

			// Proses Invers
			$a = $key_matrix[0][0];
			$b = $key_matrix[0][1];
			$c = $key_matrix[1][0];
			$d = $key_matrix[1][1];

			$tmpDet = ($a*$d) - ($b*$c);

			$tmpMod = $this->modulo($tmpDet,$this->alpa());

			// Mencari determinan
			$res = 0;$ih = 0;
			while ($res != 1) {
				$ih+=1;
				$res = ($tmpMod*$ih) % strlen($this->alpa());
			}
			$det = $ih;

			// Menghitung adjugate
			$adj = array(
			    0 => array(
			        $this->modulo($d,$this->alpa()),
			        $this->modulo(-$b,$this->alpa()),
			    ),
			    1 => array(
			        $this->modulo(-$c,$this->alpa()),
			        $this->modulo($a,$this->alpa()),
			    ),
			);

			// mengalikan determinan dan adjugate
			for ($i=0; $i <2 ; $i++) { 
				for ($j=0; $j <2 ; $j++) { 
					$adj[$i][$j] = $this->modulo($adj[$i][$j]*$det,$this->alpa());
				}
			}
			// End Proses Invers

			$plainText = "";
			$ih = 0;
			$cipher = str_split($cipher);
			while ($ih < count($cipher)) {
				$cipher_vector = $this->msgVector($cipher[$ih].$cipher[$ih+1]);
				$ih+=2;
				for($i=0;$i<2;$i++){
				  $sum = 0;
				  for($j=0;$j<2;$j++){
				    $sum+= ($adj[$i][$j] * $cipher_vector[$j]);
				  }
				  $sum%=strlen($this->alpa());
				  $plainText.=str_split($this->alpa())[$sum%(strlen($this->alpa())+1)];
				}
			}

			if(strtolower(str_split($plainText)[strlen($plainText)-1]) == "x"){
				$plainText = rtrim($plainText, "x");
			}

			return $plainText;
		}

	}
	  
?>