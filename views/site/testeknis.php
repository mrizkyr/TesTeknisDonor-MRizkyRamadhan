<html><p style="font-size:18px">1. Tulislah program sederhana dalam PHP atau JavaScript yang mencetak angka dari 1 hingga 100. Namun, untuk kelipatan 3, cetak "Fizz" (bukan angka), dan untuk kelipatan 5, cetak "Buzz". Untuk angka yang merupakan kelipatan baik 3 dan 5, cetak "FizzBuzz". Sertakan kode yang sudah dibuat!</p>
<br>

<p style="font-size:18px">Kode yang digunakan:</p>
<p style="text-align:center;"><pre>
for($x=1; $x<=100; $x++){
	if($x%5!=0 && $x%3!=0){
		echo $x;
	}else{
		if($x%3==0){
			echo "Fizz";
		}
		if($x%5==0){
			echo "Buzz";
		}
	}
	echo "&ltbr&gt";
}</pre></p>
<p style="font-size:18px">Program akan menghitung 1 sampai 100 dalam variabel $x. Jika $x tidak habis dibagi 3 dan tidak habis dibagi 5 maka $x akan dicetak. 
Namun jika $x habis dibagi tiga maka program akan mencetak Fizz, dan jika $x habis dibagi 5 program akan mencetak Buzz.</p>
<p style="font-size:18px"><b>Hasil:</b></p>
<?php
	for($x=1; $x<=100; $x++){
		if($x%5!=0 && $x%3!=0){
			echo $x;
		}else{
            if($x%3==0){
                echo "Fizz";
            }
            if($x%5==0){
                echo "Buzz";
        	}
        }
		echo "<br>";		
	}
?>

<br>

<p style="font-size:18px">2. Tulislah fungsi dalam PHP atau JavaScript yang menghasilkan 25 angka pertama dalam deret Fibonacci. Sertakan kode yang dibuat beserta Penjelasannya!</p>
<br>
<p style="font-size:18px">Kode yang digunakan:</p>
<p><pre>
$sebelum=0;$sekarang=1; 
echo $sebelum+$sekarang."&ltbr&gt";
while($sebelum+$sekarang<=25){
	echo $sebelum+$sekarang;
	echo "&ltbr&gt ";		
	$simpan=$sebelum;
	$sebelum=$sekarang;
	$sekarang=$sekarang+$simpan;
}</pre>
<p style="font-size:18px">Konsep dari deret Fibonacci adalah deretan angka yang diawali dengan 1, 1, kemudian setiap angka setelahnya merupakan hasil penjumlahan dari 2 angka sebelumnya. 
Maka dua angka pertama disimpan dalam variabel $sebelum dan $sekarang. Selanjutnya terdapat looping penjumlahan dari $sebelum ditambah $sekarang yang akan berhenti sebelum penjumlahan kedua variabel tersebut mencapai 25 atau lebih.
Setelah penjumlahan kedua variabel tersebut dicetak, nilai dari $sebelum akan disimpan dalam variabel sementara $simpan. Variabel $sebelum akan diubah nilainya menjadi sama dengan $sekarang.
Lalu variabel $sekarang akan ditambahkan dengan nilai yang tadi disimpan di dalam variabel $simpan.</p>
<p style="font-size:18px"><b>Hasil:</b></p>
<?php	
	$sebelum=0;$sekarang=1; 
	echo $sebelum+$sekarang."<br>";
	while($sebelum+$sekarang<=25){
		echo $sebelum+$sekarang;
		echo "<br> ";		
		$simpan=$sebelum;
		$sebelum=$sekarang;
		$sekarang=$sekarang+$simpan;
	}
?>

<br>

<p style="font-size:18px">3. Terdapat tiga tabel di database: Donation, Donor, dan Branch. Tabel Donation berisi catatan donasi dengan kolom seperti donation_id, donor_id, branch_id, donation_date, dan amount. Tulis query SQL yang menghitung jumlah donasi bulanan total per donor per cabang. Sertakan query SQL yang dbuat!</p>

<p style="font-size:18px">Pertama, buat ketiga tabel dahulu.</p>
<pre>
CREATE TABLE Donor (
    id int,
    name varchar(255)
);

CREATE TABLE Branch (
    id int,
    name varchar(255)
);

CREATE TABLE Donation (
    id int,
    amount int,
    donation_date date,
    donor_id int,
	branch_id int
);</pre>

<p style="font-size:18px">Kemudian isi data ke dalam database. COntohnya dengan nilai berikut.</p>

<pre>INSERT INTO `branch` (`id`, `name`) VALUES
(1, 'Branch Pekanbaru'),
(2, 'Branch Alor'),
(3, 'Branch Pontianak');

INSERT INTO `donor` (`id`, `name`) VALUES
(1, 'Boboiboy'),
(2, 'Ronaldo');

INSERT INTO `donation` (`id`, `amount`, `donation_date`, `donor_id`, `branch_id`) VALUES
(1, 3000000, '2024-04-01', 2, 1),
(2, 50000, '2024-04-11', 1, 2),
(3, 2500000, '2011-06-05', 2, 2),
(4, 2400000, '2024-04-10', 2, 2),
(5, 1200000, '2024-03-10', 2, 2),
(6, 25000, '2024-04-03', 1, 2);</pre>

<p style="font-size:18px">Kemudian query untuk menghitung total donasi tiap donor di tiap cabang per bulan adalah:<br></p>
SELECT SUM(donation.amount), donor.name as donor_name, branch.name as branch_name, MONTH(donation_date) AS month, YEAR(donation_date) AS year
FROM donation
JOIN donor ON donation.donor_id = donor.id
JOIN branch ON donation.branch_id = branch.id
GROUP BY year, month, donor.id, branch.id;
</html>