<?php
date_default_timezone_set('America/Sao_paulo');

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if((isset($_POST['email']) && !empty(trim($_POST['email']))) && (isset($_POST['mensagem']) && !empty(trim($_POST['mensagem'])))) {

        $nome = !empty($_POST['nome']) ? $_POST['nome'] : 'Não informado';
        $nome = $_POST['email'];
        $nome = !empty($_POST['telefone']) ? utf8_decode($_POST['telefone']) : 'Não informado';
        $nome = $_POST['mensagem'];
        $data = date('d/m/Y H;i;s');

        $mail = new PHPMailer();
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'andersoncamilo700@gmail.com';
        $mail->Password = '35826047';
        $mail->Port = 587;
    
        $mail->setFrom('andersoncamilo700@gmail.com');
        $mail->addAddress('andersoncamilo700@gmail.com');
        // $mail->addAddress('endereco2@provedor.com.br');
    
        $mail->isHTML(true);
        $mail->Subject = $mensagem;
        $mail->Body = "nome: {$nome}<br>
                        Email: {$email}<br>
                        Email: {$telefone}<br>
                        Mensagem: {$mensagem}<br>
                        Data/hora: {$data}";
        // $mail->Altbody = 'Chegou o email teste'
    
        if($mail->send()) {
            echo 'Email enviado com sucesso.';
        } else {
            echo 'Email não enviado.';
        }
    } else {
        echo 'Não enviado: informar o email e a mensagem.';
    }

