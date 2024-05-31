create database rpl_akhir;

use rpl_akhir;

create table matkul
(id int(5) not null primary key,
kode varchar(5) not null,
nama varchar(20) not null,
semester int(1) not null,
kelas varchar(1) not null,
prodi varchar(10) not null,
sks int(1) not null,
jam_mulai time,
jam_selesai time,
hari varchar(8) not null);

create table ruangan_lab
(kode varchar(5) not null primary key,
nama varchar(10) not null,
lokasi varchar(50) not null);

create table ruangan_kelas
(kode varchar(5) not null primary key,
nama varchar(10) not null,
lokasi varchar(50) not null);

create table prminjaman_kelas
(id varchar(5) not null primary key,
nama varchar(15) not null,
nim int(8) not null,
tanggal date not null,
waktu time not null,
prodi varchar(10) not null,
kode_ruangan varchar(5) not null,
nama_ruangan varchar(20) not null);

create table guru
(nip int(8) primary key,
username varchar(20) not null,
password varchar(20) not null);

create table murid
(nis int(8) primary key,
username varchar(20) not null,
password varchar(20) not null);

create table informasi
(id varchar(5) not null primary key,
informasi varchar(50) not null);