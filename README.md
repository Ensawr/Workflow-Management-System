# Workflow Management System

WMS is a product tracking program and can carrying and saving photographs which connected with products.

## Introduction

This version have 4 parts;
- Storage
- Studio
- Retouch
- Product Control

In the storage part just click the update button in “Nebim Update” page. This button bring the data to studio pages from studio database in ERP(I used here NebimV3).

Studio have a manager account and 4 different accounts for job division. Studio Manager can send the products to studios. If necessary, can change the studio of products. Studio accounts upload the photos for retouch and if they make a mistake can change photos.

Retouch users can download photos which came from studio. When they finish the retouch process then they can upload for control and if they make a mistake can change photos like studio users.

Product manager can see final version of photos. If everthing is okay it can click the complete button and agree product. Completed products wait for download. If neccessary can click the “View Content” and change the order of photos.

## Requirements

- You must install [xampp](https://www.apachefriends.org/index.html) for apache and mysql server. Then, open localhost and create a database called 'WMS' and import 'WMS.sql' file.
- Folders must be in htdocs folder and you can access to program from localhost.
<br>
<br>
<br>
<p dir="rtl">
  Frontend written by @farukkse
</p>
