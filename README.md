<h1 align="center">Hospital Management System</h1>

<p align="center">
  <img src="https://img.shields.io/badge/version-1.0.0-blue" alt="Version">
  <img src="https://img.shields.io/badge/license-All%20rights%20reserved-red" alt="License">
</p>

<p align="center">
  A hospital management system built with <strong>Laravel, Vue 3, Inertia.js and TypeScript</strong>: patients, appointments, role-based access, payments and receipts, and reports.
</p>

---

<h2>Ownership</h2>
<p>
  I designed and wrote this system myself; it is my own product, not client work. One private hospital in Juba, South Sudan, licenses a copy, which I installed and support. This repository contains no patient data, and none of that hospital's branding or configuration. It is public so employers can read the code; see the License section below.
</p>

---

<h2>Features</h2>
<ul>
  <li><strong>Patient management</strong>: patient records</li>
  <li><strong>Appointments</strong>: booking and scheduling</li>
  <li><strong>Role-based access</strong>: different permissions for each staff role</li>
  <li><strong>Payments</strong>: payments and receipt generation</li>
  <li><strong>Reports</strong>: charts and summaries</li>
</ul>

---

<h2>Technologies Used</h2>
<ul>
  <li><strong>Frontend</strong>: Vue 3, Inertia.js, TypeScript, Tailwind</li>
  <li><strong>Backend</strong>: Laravel 10, PHP 8.2</li>
  <li><strong>Database</strong>: MySQL 8</li>
  <li><strong>Containers</strong>: Docker (Laravel Sail / Docker Compose), with Kubernetes manifests in <code>kube/</code></li>
</ul>

---

<h2>Run it locally</h2>

<h3>Laravel Sail</h3>
<ol>
  <li>Clone the repository:
    <pre>git clone https://github.com/Mubaraklouis/hospital-management-system.git
cd hospital-management-system</pre>
  </li>
  <li>Install dependencies:
    <pre>composer install
npm install</pre>
  </li>
  <li>Configure the environment and start the containers:
    <pre>cp .env.example .env
./vendor/bin/sail up -d</pre>
  </li>
  <li>Run migrations and seed demo data:
    <pre>./vendor/bin/sail artisan migrate --seed</pre>
  </li>
  <li>Start the frontend dev server:
    <pre>./vendor/bin/sail npm run dev</pre>
  </li>
</ol>

<h3>Docker Compose</h3>
<pre>
docker-compose up -d --build
docker-compose exec app composer install
docker-compose exec app npm install && npm run build
docker-compose exec app php artisan migrate --seed
</pre>

---

<h2>Kubernetes</h2>
<p>The <code>kube/</code> folder holds the manifests and scripts I used to run the app on a self-managed Kubernetes cluster built with kubeadm:</p>
<ul>
  <li><code>deployment.yaml</code> and <code>service.yaml</code>: the Laravel application (image <code>mubaraklouis/hospitalsystem</code>)</li>
  <li><code>mysql-deployment.yaml</code>: MySQL with a persistent volume. The password in it is a development placeholder; use your own Secret in any real environment.</li>
  <li><code>kubeadm.sh</code>: node setup (Docker, kubelet, kubeadm, kubectl)</li>
</ul>
<pre>
kubectl apply -f kube/
</pre>

---

<h2>Testing</h2>
<pre>
./vendor/bin/sail test
</pre>

---

<h2>License</h2>
<p>
  Copyright (c) 2026 Mobarak Kuol Louis Dau. All rights reserved. This code is published for portfolio and evaluation purposes only. No permission is granted to use, copy, modify or distribute it without prior written permission. See the LICENSE file. For licensing enquiries: mubaraklouis@gmail.com
</p>

<h2>Contact</h2>
<p>
  Mobarak Kuol Louis · mubaraklouis@gmail.com · <a href="https://www.linkedin.com/in/mobarak-kuol-louis">LinkedIn</a>
</p>

---

<h2>Screenshots</h2>
<p align="center">

<img width="1920" alt="Screen Shot 2025-04-01 at 1 31 11 PM" src="https://github.com/user-attachments/assets/04185e12-eb2b-4172-97bb-cff46d13f2f3" />


<img width="1920" alt="Screen Shot 2025-04-01 at 1 30 35 PM" src="https://github.com/user-attachments/assets/d345e108-32ad-453b-aabc-527b80e677c0" />


</p>
