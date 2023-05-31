<?php
    $a=$b=$cal=$result='';
    if (!empty($_GET)){
        if (isset($_GET['a']))
        {
            $a =$_GET['a'];
        }
        if (isset($_GET['b']))
        {
            $b =$_GET['b'];
        }
        if (isset($_GET['cal']))
        {
            $cal =$_GET['cal'];
        }
    }
    switch($cal){
        case'+':
            $result= $a+$b;
            break;
        case'-':
            $result= $a-$b;
            break;
        case'*':
            $result= $a*$b;
            break;
        case'/':
            $result= $a/$b;
            break;
    }
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Calculator - Online</title>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
	<style type="text/css">
        body{
          
        }
		table{
			background-color: #ABB1BA;
			margin: auto;
		}
		#result{
			width: 416px;
			height: 70px;
		}
		.btn{
			width: 80px;
			height: 80px;
		}
		#equ{
			width: 80px;
			height: 164px;
		}
		#zero{
			width: 164px;
			height: 80px;
		}
        .header{
            width:100%; 
            height:60px; 
            background-color:#ABB1BA;
            margin-bottom:30px; 
            text-align: left;
            padding: 10px;
        }
	</style>
</head>
<body>
    <header class="header">
        <a href="https://www.youtube.com/watch?v=bpvibg34-eo&list=PLMPBVRu4TjAw0uDNojnQkOFEocCulmngQ&index=6" style="text-decoration: none;">
            <h1 style="margin-top:10px; color: aliceblue">MÁY TÍNH ONLINE</h1>
        </a>
    </header>
    <form action="" id="MyForm" method="GET" style="background-color: rgb(136, 139, 178);padding:30px; margin:15px; display: none;">
        <input type="number" name="a" placeholder="Enter A" >
        <input type="number" name="b" placeholder="Enter B" >
        <select name="cal" required="true">
            <option value="">Phép tính</option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <button type="submit" >Submit</button>
        <p>Kết quả: <?=$result?></p>
    </form>
	<table>
		<tr>
			<td colspan="7"><input id="result" type="text" value="<?=($a.$cal.$b.' = '.$result)?>" disabled placeholder="Result"></td>
		</tr>
		<tr>
			<td><input type="button" class="btn" value="7"></td>
			<td><input type="button" class="btn" value="8"></td>
			<td><input type="button" class="btn" value="9"></td>
			<td><input type="button" class="btn" value="/"></td>
			<td><input type="button" class="btn" value="C"></td>
		</tr>
		<tr>
			<td><input type="button" class="btn" value="4"></td>
			<td><input type="button" class="btn" value="5"></td>
			<td><input type="button" class="btn" value="6"></td>
			<td><input type="button" class="btn" value="*"></td>
			<td><input type="button" class="btn" value="AC"></td>
		</tr>
		<tr>
			<td><input type="button" class="btn" value="1"></td>
			<td><input type="button" class="btn" value="2"></td>
			<td><input type="button" class="btn" value="3"></td>
			<td><input type="button" class="btn" value="-"></td>
			<td rowspan="2"><input id="equ" type="button" class="btn" value="="></td>
		</tr>
		<tr>
			<td  colspan="2"><input type="button" id="zero"  class="btn" value="0"></td>
			<td><input type="button" class="btn" value=","></td>
			<td><input type="button" class="btn" value="+"></td>
		</tr>
	</table>
    <script type="text/javascript">
        $(function() {
			$('input').click(function() {
				// console.log($(this).val())
				var v = $(this).val()
				switch(v) {
					case '+':
					case '-':
					case '*':
					case '/':
						$('[name=cal]').val(v)
					break;
					case '=':
						//submit data
						$('#MyForm').submit()
					break;
					case 'AC':
					case 'C':
						$('[name=a]').val('')
						$('[name=b]').val('')
						$('[name=cal]').val('')
					break;
					default:
						if($('[name=cal]').val() != '') {
							//nhap B
							$('[name=b]').val($('[name=b]').val() + v)
						} else {
							//nhap A
							$('[name=a]').val($('[name=a]').val() + v)
						}
					break;
				}

				$('#result').val($('[name=a]').val() + $('[name=cal]').val() + $('[name=b]').val())
			})
		})
    </script>
</body>
</html>