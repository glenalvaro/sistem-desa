<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('tema/modern/component/meta'); ?>
    <?php $this->load->view('tema/modern/component/script_css'); ?>
<style>
    
/*  Get dari database  */
:root {
  --warna-web  : <?= $tema_warna; ?>;
  --warna-teks : <?= $teks_warna; ?>;
}
body{
    font-family: 'Rubik', sans-serif !important;
    font-size: 93.75%;
}

.color-web{
    background-color: var(--warna-web);
}
.text-web{
    color: var(--warna-teks);
}
.link-color{
    color: var(--warna-web);
}
.color-statistik{
  background-color:var(--warna-teks);
}
.txt_head{
    text-shadow: 2px 2px 2px #000; 
    -webkit-text-stroke: 1px #fff;
}
.latar-web{
    background: url(<?= base_url('assets/img/latar_modul/') . $latar_web; ?>)
    no-repeat center center fixed;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
}
.hr_line {
     background-color: var(--warna-web);
}

/*Informasi*/
.text_berjalan {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: left;
    align-items: center;
    align-items: center;
    padding: 0 7px;
    left: 40px;
    font-weight: 700;
    color: #f0f8ff;
    background: var(--warna-web);
}

@media (max-width : 992px){
.text_berjalan {
    left: 10px;
 }
}

.informasi__item {
    font-weight: 400;
    font-size: 12px;
}

/*slick slide*/
.thumbnail-desktop{
   width: 350px;
   height: 310px;
   background: #fff;
   border: 1px solid #eaedf3;
   box-shadow: 0 1px 3px rgb(0 0 0 / 4%);
   border-radius: 10px !important;
   cursor: pointer;
}
.thumbnail-image-desktop {
    height: 200px !important;
    border-radius: 4px 4px 0 0;
    overflow: hidden;
}
.thumbnail-image-desktop img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}
.thumbnail-content-desktop {
    font-size: 11px;
    padding: 15px;
    min-height: 195px;
}
.thumbnail-content-desktop a:hover {
   text-decoration: underline;
   color: #142b72;
}
.thumbnail-title-desktop {
    font-size: 12px;
    font-weight: 500;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
.thumbnail-keterangan-desktop {
    color: #e2e1e1;
    font-size: 12px;
}
.slider {
   width: 100%;
}
.slider .slick-prev {
    background-image: url(<?= base_url('assets/tema/img/icon/prev.svg') ?>);
    left: 10px;
}

.slider .slick-next {
    background-image: url(<?= base_url('assets/tema/img/icon/next.svg') ?>);
    right: 10px;
}
.slick-next, .slick-prev {
    top: 0;
    margin: -12px;
    position: absolute;
    display: block;
    width: 20px;
    height: 20px;
    padding: 0;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    cursor: pointer;
    border: none;
}
.slider .slick-next, .slick-prev {
    width: 30px;
    height: 30px;
    background-size: contain;
    z-index: 5;
}
.slick-initialized .slick-slide {
    display: block;
}
.slick-prev:before,
.slick-next:before {
   display:none;
}
/* Button */
.btn_more{
    border: 1px solid black;
    border-radius: 7px;
    background-color: #fff;
    color: black;
    cursor: pointer;
    height: 35px;
    width: 100%;
}
.txt_more{
    border-color: var(--warna-web);
    color: var(--warna-web);
    font-size: 12px;
    text-align: center;
}
.highcharts-background{
    display: none !important;
}

/*Swiper CSS*/
.swiper-slide {
    text-align: center;
    font-size: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    background: rgba(0, 0, 0, 0.8);
    z-index: 1;
}

.swiper-slide p{
    top: 30%;
    left: 50px;
    position: absolute;
    margin-top: 30px;
}
.title_slide{
    --text-line-clamp: 2;
    color: #fff;
    width: 70%;
    word-wrap: break-word;
    white-space:pre-wrap;
    font-weight: bold;
    text-align: left;
    line-height: 1em;
    text-shadow: 2px 2px 2px #000;
    -webkit-text-stroke: -3px #fff;
}
.desc_slide{
    --text-line-clamp: 2;
    top: 38% !important;
    color: #fff;
    width: 80%;
    font-weight: bold;
    text-align: left;
    word-wrap: break-word;
    white-space:pre-wrap;
    text-shadow: 2px 2px 2px #000;
    -webkit-text-stroke: -1px #fff;
}
.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/*SOTK*/
.thumbnail-staff{
   width: 300px;
   height: 310px;
   border: 1px solid #eaedf3;
   box-shadow: 0 1px 3px rgb(0 0 0 / 4%);
   border-radius: 10px !important;
}
.thumbnail-image-staff {
    height: 240px !important;
    border-radius: 4px 4px 0 0;
    overflow: hidden;
}
.thumbnail-image-staff img {
    width: 100%;
    padding: 0;
}
.thumbnail-content-staff {
    position: relative;
    z-index: 2;
    padding: 19px;
    text-align: center;
    background-color: var(--warna-teks);
    border-bottom-left-radius: 10px !important;
    border-bottom-right-radius: 10px !important;
}
.thumbnail-title-staff {
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
.thumbnail-keterangan-staff {
    color: #fff;
    font-size: 12px;
    font-weight: 500;
    line-height: 0.2em;
}

/*Artikel*/
.artikel-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.artikel-box {
  color: #fff;
  position: relative;
  overflow: hidden;
  margin: 10px;
  min-width: 220px;
  max-width: 310px;
  width: 100%;
  background-color: #ffffff;
  color: black;
  text-align: left;
  font-size: 16px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  border-radius: 10px; 
}
.artikel-box * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.artikel-box .image {
  max-height: 230px;
  overflow: hidden;
}
.artikel-box img {
  max-width: 100%;
  width: 100%;
  height: 180px;
  vertical-align: top;
  position: relative;
   overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp:5;
  -webkit-box-orient:vertical;
}
.artikel-box figcaption {
  padding: 25px;
  position: relative;
}
.artikel-box .date {
  background-color: var(--warna-teks);
  top: 25px;
  color: #fff;
  left: 25px;
  min-height: 48px;
  min-width: 48px;
  position: absolute;
  text-align: center;
  font-size: 10px;
  font-weight: 700;
  text-transform: uppercase;
}
.artikel-box .date span {
  display: block;
  line-height: 24px;
}
.artikel-box .date .month {
  font-size: 10px;
  background-color: var(--warna-teks);
}
.artikel-box h3,
.artikel-box p {
  margin: 0;
  padding: 0;
}
.artikel-box h3 {
  min-height: 50px;
  margin-bottom: 10px;
  margin-left: 60px;
  display: inline-block;
  font-weight: 600;
  text-transform: uppercase;
}
.artikel-box p {
  margin-bottom: 20px;
  line-height: 1.6em;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp:5;
  -webkit-box-orient:vertical;
}

.artikel-box h3 a:hover {
    color: var(--warna-teks);
}


.artikel-box:hover img,
.artikel-box.hover img {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

.artikel-box footer {
  padding: 0 25px;
  color: grey;
  font-size: 0.8em;
  line-height: 30px;
  text-align: right;
  position: absolute;
  z-index: 1;
  bottom: 0;
}
.artikel-box footer > div {
  display: inline-block;
  margin-bottom: 10px;
  font-size: 12px;
}

@media (max-width: 850px) {
  .artikel-list {
      display: none;
  }
}

/*Galeri Width*/
@media (max-width: 850px) {
  .galeri-list {
      display: none;
  }
}

/*Statistik Style*/
.txt_count {
  font-weight: bold;
  font-size: 20px;
  text-shadow: 4px 4px 4px #000; 
  -webkit-text-stroke: 1px #fff;
}

.txt_count_phone{
  color: #000; 
  font-size: 14px;
}

.boxStat {
  flex-basis:95%;
  padding:10px 20px;
  text-transform: capitalize;
  display: flex;
  flex-wrap: wrap;
  justify-content:space-between;
  gap:4%;
}

.box-item {
  padding: 20px;
  border-radius: 15px;
  background-color: white;
  width: 22%;
  min-height:30px;
  color: grey;
  margin:15px 0;
  box-shadow: 3px 4px 8px 2px rgba(0,0,0,0.5);
  display: flex;
  justify-content: space-between;
  gap: 5%;
}
.box-item div{
  display: flex;
  flex-direction: column;
  gap: 10px;
  flex-basis: 70%;
  text-align: center;
}
.box-item img {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50px;
  width: 50px;
}
.box-item * {
  text-wrap: nowrap;
}
.box-item strong {
  color:black;
  font-weight: 500;
  font-size:20px;
}
@media (max-width: 850px) {
  .boxStat {
    justify-content: space-between;
    gap: unset;
  }
  .box-item {
    width: 49%;
  }
}
@media (max-width: 400px) {
  .boxStat {
      justify-content: center;
  }
  .box-item {
    width: 100%;
  }
}

/*Card*/
.card-box{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1;
}
.card-content {
    width: 260px;
    position: relative;
    box-shadow: 0 2px 7px #dfdfdf;
    background: #ffffff;
    overflow: hidden;
    margin: 10px;
    border-radius: 10px; 
}

.card-catagory {
    display: block;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    color: #ccc;
    margin-bottom: 15px;
}
.card-tumb {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 180px;
    background: #f0f0f0;
}

.card-tumb img {
    max-width: 100%;
    max-height: 100%;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card-details {
    padding: 30px;
}

.card-details h4 a {
    font-size: 12px !important;
    font-weight: 500;
    display: block;
    margin-bottom: 18px;
    text-transform: uppercase;
    color: var(--warna-web);
    text-decoration: none;
    transition: 0.3s;
}

.card-details h4 a:hover {
    color: var(--warna-teks);
}

.card-details p {
    font-size: 11px;
    line-height: 22px;
    color: #999;
     overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}

.card-bottom-details {
    overflow: hidden;
    border-top: 1px solid #eee;
    padding-top: 20px;
}

.card-bottom-details div {
    float: left;
    width: 50%;
}

.card-price {
    font-size: 12px;
    color: var(--warna-teks);
    font-weight: 600;
}

.card-links {
    text-align: right;
}

.card-links a {
    display: inline-block;
    margin-left: 5px;
    color: #e1e1e1;
    transition: 0.3s;
    font-size: 17px;
}

.card-links a:hover {
    color: var(--warna-teks);
}

@media (max-width: 850px) {
  .card-box {
    justify-content: space-between;
    gap: unset;
  }
  .card-content {
    width: 100%;
  }
}

/*Berita*/
.card-berita {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1;
}

.card-box-berita {
  color: #fff;
  position: relative;
  overflow: hidden;
  margin: 10px;
  width: 300px;
  background-color: #ffffff;
  color: black;
 
  font-size: 16px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  border-radius: 10px; 
}
.card-box-berita * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.card-box-berita .img_berita {
  max-height: 230px;
  overflow: hidden;
}
.card-box-berita img {
  max-width: 100%;
  width: 100%;
  height: 180px;
  vertical-align: top;
  position: relative;
   overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp:5;
  -webkit-box-orient:vertical;
}
.card-box-berita figcaption {
  padding: 25px;
  position: relative;
}
.card-box-berita .date_berita {
  background-color: var(--warna-teks);
  top: 25px;
  color: #fff;
  left: 25px;
  min-height: 48px;
  min-width: 48px;
  position: absolute;
  text-align: center;
  font-size: 10px;
  font-weight: 700;
  text-transform: uppercase;
}
.card-box-berita .date_berita span {
  display: block;
  line-height: 24px;
}
.card-box-berita .date_berita .month_berita {
  font-size: 10px;
  background-color: var(--warna-teks);
}
.card-box-berita h3 a:hover {
    color: var(--warna-teks);
}

.card-box-berita h3,
.card-box-berita p {
  margin: 0;
  padding: 0;
}
.card-box-berita h3 {
  min-height: 50px;
  margin-bottom: 10px;
  margin-left: 60px;
  display: inline-block;
  font-weight: 600;
  text-transform: uppercase;
}
.card-box-berita p {
  margin-bottom: 20px;
  line-height: 1.6em;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp:5;
  -webkit-box-orient:vertical;
}

.card-box-berita:hover img,
.card-box-berita.hover img {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

.card-box-berita footer {
  padding: 0 25px;
  color: grey;
  font-size: 0.8em;
  line-height: 30px;
  text-align: right;
  position: absolute;
  z-index: 1;
  bottom: 0;
}
.card-box-berita footer > div {
  display: inline-block;
  margin-bottom: 10px;
  font-size: 12px;
}

@media (max-width: 850px) {
  .card-box-berita {
    justify-content: space-between;
    gap: unset;
    width: 100%;
  }
  .card-box-berita img {
    width: 100%;
    height: 100%;
  }
}

/*Halaman Style*/
.pagination {
  list-style: none;
  display: inline-block;
  padding: 0;
  margin-top: 10px;
}
.pagination li {
  display: inline;
  text-align: center;
}
.pagination a {
  float: left;
  display: block;
  font-size: 14px;
  text-decoration: none;
  padding: 5px 12px;
  color: #fff;
  margin-left: -1px;
  border: 1px solid transparent;
  line-height: 1.5;
}
.pagination a.active {
  cursor: default;
}
.pagination a:active {
  outline: none;
}

.page-pagging li:first-child a {
  -moz-border-radius: 6px 0 0 6px;
  -webkit-border-radius: 6px;
  border-radius: 6px 0 0 6px;
}
.page-pagging li:last-child a {
  -moz-border-radius: 0 6px 6px 0;
  -webkit-border-radius: 0;
  border-radius: 0 6px 6px 0;
}
.page-pagging a {
  border-color: #ddd;
  color: var(--warna-teks);
  background: #fff;
}
.page-pagging a:hover {
  background: #eee;
}
.page-pagging a.active, .page-pagging a:active {
  border-color: var(--warna-web);
  background: var(--warna-web);
  color: #fff;
}

/*  Form Cari Bantuan  */
.search-data{
    border: 1px solid var(--warna-teks);
    overflow: hidden;
    border-radius: 10px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    width: 80%;
    height: 39px;
}

.search-data .input-data{
    position: relative;
    box-shadow: none !important;
    border: 0px;
    width: 80%;
    height: 42px;
    padding: 10px 14px 14px 20px;
    margin: -1px;
    background-color: #f9fafb;
}

.search-data .input-data:focus{
    outline: none;
}

.search-data .btn-submit {
    position: relative;
    border: 0px;
    background: none;
    background-color: var(--warna-web);
    color: #fff;
    float: right;
    padding: 10px 20px;
    margin: -3px;
    border-radius-top-right: 5px;
    -moz-border-radius-top-right: 5px;
    -webkit-border-radius-top-right: 5px;
    border-radius-bottom-right: 5px;
    -moz-border-radius-bottom-right: 5px;
    -webkit-border-radius-bottom-right: 5px;
    cursor:pointer;
}
.search-data .btn-submit:hover
{
    background-color: var(--warna-teks);
}

@media only screen and (min-width : 150px) and (max-width : 780px)
{
    .search-data {
        width: 95%;
        margin: 0 auto;
    }
    .search-data .btn-submit {
        height: 43px;
    }
}

#hasil-pencarian h2 {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 1rem;
  line-height: 2.8rem;
  letter-spacing: 0.01rem;
  font-weight: 400;
  color: #212121;
  text-align: center;
}

.table-data {
  width: 100%;
  max-width: 100%;
  margin-bottom: 2rem;
  background-color: #ffffff;
}
.table-data > thead > tr,
.table-data > tbody > tr,
.table-data > tfoot > tr {
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.table-data > thead > tr > th,
.table-data > tbody > tr > th,
.table-data > tfoot > tr > th,
.table-data > thead > tr > td,
.table-data > tbody > tr > td,
.table-data > tfoot > tr > td {
font-size: 13px;
  text-align: left;
  padding: 1.2rem;
  vertical-align: top;
  border-top: 0;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.table-data > thead > tr > th {
  font-weight: 400;
  color: #757575;
  vertical-align: bottom;
  border-bottom: 1px solid rgba(0, 0, 0, 0.12);
}
.table-data > caption + thead > tr:first-child > th,
.table-data > colgroup + thead > tr:first-child > th,
.table-data > thead:first-child > tr:first-child > th,
.table-data > caption + thead > tr:first-child > td,
.table-data > colgroup + thead > tr:first-child > td,
.table-data > thead:first-child > tr:first-child > td {
  border-top: 0;
}
.table-data > tbody + tbody {
  border-top: 1px solid rgba(0, 0, 0, 0.12);
}
.table-data .table-data {
  background-color: #ffffff;
}
.table-data .no-border {
  border: 0;
}
.table-condensed > thead > tr > th,
.table-condensed > tbody > tr > th,
.table-condensed > tfoot > tr > th,
.table-condensed > thead > tr > td,
.table-condensed > tbody > tr > td,
.table-condensed > tfoot > tr > td {
  padding: 0.8rem;
}
.table-bordered {
  border: 0;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 0;
  border-bottom: 1px solid #e0e0e0;
}
.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
  border-bottom-width: 2px;
}
.table-striped > tbody > tr:nth-child(odd) > td,
.table-striped > tbody > tr:nth-child(odd) > th {
  background-color: #f5f5f5;
}
.table-hover > tbody > tr:hover > td,
.table-hover > tbody > tr:hover > th {
  background-color: rgba(0, 0, 0, 0.12);
}
@media screen and (max-width: 768px) {
  .table-responsive-vertical > .table-data {
    margin-bottom: 0;
    background-color: transparent;
  }
  .table-responsive-vertical > .table-data > thead,
  .table-responsive-vertical > .table-data > tfoot {
    display: none;
  }
  .table-responsive-vertical > .table-data > tbody {
    display: block;
  }
  .table-responsive-vertical > .table-data > tbody > tr {
    display: block;
    border: 1px solid #e0e0e0;
    border-radius: 2px;
    margin-bottom: 1.6rem;
  }
  .table-responsive-vertical > .table-data > tbody > tr > td {
    background-color: #ffffff;
    display: block;
    vertical-align: middle;
    text-align: right;
    font-size: 13px;
  }
  .table-responsive-vertical > .table-data > tbody > tr > td[data-title]:before {
    content: attr(data-title);
    float: left;
    font-size: inherit;
    font-weight: 400;
    color: #757575;
  }
  .table-responsive-vertical.shadow-z-1 {
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
  }
  .table-responsive-vertical.shadow-z-1 > .table-data > tbody > tr {
    border: none;
    -webkit-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
    -moz-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
  }
  .table-responsive-vertical > .table-bordered {
    border: 0;
  }
  .table-responsive-vertical > .table-bordered > tbody > tr > td {
    border: 0;
    border-bottom: 1px solid #e0e0e0;
  }
  .table-responsive-vertical > .table-bordered > tbody > tr > td:last-child {
    border-bottom: 0;
  }
}

 .header-logo{
    position: relative;
    height: 50px;
    margin: 0 0 0 0;
    padding: 0 10px;
    top: 5px;
    left: 40px;
    width: auto;
}

.header-logo img{
    float: left;
    height: 33px;
    margin: 0 10px 0 0;
}

.header-logo h1{
    position: relative;
    font-size: 86%;
    float: left;
    margin: 0;
    padding: 0;
    bottom: 2px;
}

@media (max-width : 992px){
.header-logo {
    margin: 0 auto;
    left: 10px;
 }
.header-logo h1{
    font-size: 11px;
    position: relative;
    margin: 0 5px 0 5px;
    bottom: 2px;
    top: -1px;
 }
.header-logo img {
    margin: 0 5px 0 0;
    height: 34px;
 }
}
.link_dropdown a:hover{
    background-color: var(--warna-teks);
}
</style>
</head>

<body class="bg-gray-50">
     <div id="loading" class="w-screen h-screen bg-white items-center justify-center hidden">
        <div class="aspect-square w-[40%] flex flex-col items-center">
            <img style="width: 80px !important;" src="<?= base_url('assets/img/logo/') . $logo_desa; ?>">
            <br>
            <div class="flex space-x-2 loading">
                <div class="w-6 h-6 phone:w-4 phone:h-4 rounded-full dot"></div>
                <div class="w-6 h-6 phone:w-4 phone:h-4 rounded-full dot"></div>
                <div class="w-6 h-6 phone:w-4 phone:h-4 rounded-full dot"></div>
                <div class="w-6 h-6 phone:w-4 phone:h-4 rounded-full dot"></div>
                <div class="w-6 h-6 phone:w-4 phone:h-4 rounded-full dot"></div>
            </div>
        </div>
    </div>
    <nav class="w-full h-auto fixed top-0 left-0 z-50 rounded-b-2xl">
    <div class="absolute top-0 left-0 z-20">
        <div class="header-logo flex flex-wrap">
            <a href="<?= site_url('web'); ?>">
                <img src="<?= base_url('assets/img/logo/').$logo_desa; ?>">
                <h1 class="text-white drop-shadow-md font-semibold">
                    <b><?= $sebutan_desa; ?> <?= $nama_desa; ?></b>
                    <div class="title-head"><?= $sebutan_kab; ?> <?= $nama_kabupaten; ?></div>
                </h1>
            </a>
        </div>
    </div>

<div class="color-web flex flex-col w-full backdrop-blur-md fixed top-0 left-0 right-0 z-10">
        <div id="menu" class="flex justify-end items-center">
            <ul class="2xl:flex xl:flex lg:flex flex-row justify-between gap-4 px-2 py-3 mx-2 md:hidden sm:hidden phone:hidden">
                <li class="flex flex-col gap-1">
                    <a href="<?= base_url('web'); ?>" class="font-semibold text-[0.95rem] hover:text-white text-white drop-shadow-md ease-in-out duration-150">Beranda</a>
                </li>
                <li class="text-gray-600 flex items-center justify-center">
                    <svg width="28" height="28" xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                        class="w-6 h-6 current-fill" stroke="currentColor" fill="none">
                        <g>
                            <line stroke-linecap="undefined" stroke-linejoin="undefined" id="svg_1" y2="23.43284"
                                x2="12.45977" y1="0.14173" x1="12.45977" stroke="#b1b1b1" fill="none" />
                        </g>
                    </svg>
                </li>
                <!-- GET MENU  -->
                <?php 
                    $query = $this->db->query("SELECT * FROM menu_web ORDER BY id ASC LIMIT 6");
                    $result = $query->result();
                ?>
                <!-- LOOPING MENU -->
                <?php foreach($result as $main) : ?>
                <?php if($main->status == 1) : ?>
                <li class="dropdown flex flex-col" data-open="false">
                    <div class="flex justify-between items-center gap-4">
                        <div class="flex flex-col gap-1">
                        <?php if($main->jenis_link == 3) : ?>
                            <a href="<?= $main->link; ?>" class="text-[0.95rem] cursor-pointer ease-in-out duration-150 font-semibold hover:text-white text-white drop-shadow-md" aria-haspopup="true" aria-expanded="false"><?= $main->nama; ?></a>
                        <?php else : ?>
                            <a href="<?= base_url('web/'.$main->link.'/'.slug_url($main->nama)); ?>" class="text-[0.95rem] cursor-pointer ease-in-out duration-150 font-semibold hover:text-white text-white drop-shadow-md" aria-haspopup="true" aria-expanded="false"><?= $main->nama; ?></a>
                            <?php if($this->uri->segment('2') == $main->link) : ?>
                                <span style="background-color: #fff;" class="w-10 h-1 self-center block"></span>
                            <?php endif; ?>
                        <?php endif ?>
                        </div>
                <!-- QUERI SUB MENU -->
                <?php 
                $menu_id = $main->id;
                $query_sub = "SELECT *
                               FROM `sub_menu_web` JOIN `menu_web` 
                                 ON `sub_menu_web`.`id_menu` = `menu_web`.`id`
                              WHERE `sub_menu_web`.`id_menu` = $menu_id
                                AND `sub_menu_web`.`aktif` = 1
                              ORDER BY `sub_menu_web`.`id` DESC";
                $sub_menu = $this->db->query($query_sub)->result_array();
                ?> 
                <!-- JIKA SUB MENU ADA TAMPILKAN ICON DROPDOWN -->
                <?php if($sub_menu) : ?>
                    <i style="color: #fff;" class="fa fa-chevron-down"></i>
                </div>
                <?php endif; ?>
                <!-- JIKA SUB MENU ADA TAMPILKAN MENU DROPDOWN -->
                <?php if($sub_menu) : ?>
                <ul class="w-[calc(100%*0.17)] absolute z-20 mt-[3.1rem] p-2 px-4 rounded-lg shadow-md invisible opacity-0 transition duration-300 flex flex-col gap-1 bg-white/40 backdrop-blur-md link_dropdown" aria-role="menu" aria-hidden="true">
                <!-- LOOPING SUB MENU -->
                    <?php foreach($sub_menu as $val) : ?>
                        <?php if($val['tipe_link'] == 3) : ?>
                            <a target="_blank" href="<?= $val['url']; ?>" class="link-color hover:cursor-pointer font-semibold hover:text-white ease-in-out duration-200 text-[0.90rem] focus:-translate-x-1 focus:shadow-md rounded-lg p-2" tabindex="-1" aria-role="menuitem"><?= $val['sub_nama']; ?></a>
                        <?php else : ?>
                            <a href="<?= base_url('web/'.$val['url'].'/'.slug_url($val['sub_nama'])); ?>" class="link-color hover:cursor-pointer font-semibold hover:text-white ease-in-out duration-200 text-[0.90rem] focus:-translate-x-1 focus:shadow-md rounded-lg p-2" tabindex="-1" aria-role="menuitem"><?= $val['sub_nama']; ?></a>
                        <?php endif; ?>
                            <li class="mx-2 border border-[#979797]"></li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                </li>
                 <li class="text-gray-600 flex items-center justify-center">
                    <svg width="28" height="28" xmlns="http://www.w3.org/2000/svg" stroke-width="2"
                        class="w-6 h-6 current-fill" stroke="currentColor" fill="none">
                        <g>
                            <line stroke-linecap="undefined" stroke-linejoin="undefined" id="svg_1" y2="23.43284"
                                x2="12.45977" y1="0.14173" x1="12.45977" stroke="#b1b1b1" fill="none" />
                        </g>
                    </svg>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
                <li class="text-gray-300 flex items-center justify-center">
                    <a href="#"></a>
                </li>
            </ul>
            <!-- Responsive -->
            <div class="2xl:hidden xl:hidden lg:hidden">
                <button class="navbar-burger flex items-end text-white p-3">
                    <svg class="block h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Mobile menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
    <?php $this->load->view('tema/modern/component/menu_mobile'); ?>
<div class="w-full h-full">
<!-- Header -->
   
