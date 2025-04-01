<h1 align="center">Hospital Management System</h1>

<p align="center">
  <img src="https://img.shields.io/badge/version-1.0.0-blue" alt="Version">
  <img src="https://img.shields.io/badge/status-production-green" alt="Status">
  <img src="https://img.shields.io/badge/license-MIT-orange" alt="License">
</p>

<p align="center">
  A modern <strong>Hospital Management System</strong> built with <strong>Inertia.js, Vue.js, Laravel, and TypeScript</strong>. This system streamlines hospital operations including patient management, appointments, role-based access control, and financial management. Deployed with Kubernetes and AWS EKS for enterprise-grade scalability.
</p>
<p align="center">
  <a href="http://13.61.182.166" target="_blank">
    <img src="https://img.shields.io/badge/%F0%9F%8F%A5-Live_Production_System-success?style=for-the-badge&logo=google-chrome" alt="Live System">
  </a>
</p>
---

<h2>Features</h2>

<h3>Core Features</h3>
<ul>
  <li><strong>Patient Management</strong>: Complete patient record management</li>
  <li><strong>Appointment Scheduling</strong>: Intelligent scheduling system</li>
  <li><strong>Role-Based Access</strong>: Multi-level user permissions</li>
  <li><strong>Financial System</strong>: Payments and receipt generation</li>
  <li><strong>Data Visualization</strong>: Interactive charts and reports</li>
</ul>

<h3>Advanced Features</h3>
<ul>
  <li><strong>Kubernetes Orchestration</strong>: Production-grade container management</li>
  <li><strong>API Gateway</strong>: Nginx-based request routing</li>
  <li><strong>Multi-Environment Setup</strong>: Local development and cloud production</li>
  <li><strong>Auto-Scaling</strong>: Horizontal pod scaling in EKS</li>
</ul>

---

<h2>Technologies Used</h2>
<ul>
  <li><strong>Frontend</strong>: Vue 3, Inertia.js, TypeScript, Tailwind</li>
  <li><strong>Backend</strong>: Laravel 10, PHP 8.2</li>
  <li><strong>Database</strong>: MySQL 8, Redis</li>
  <li><strong>Infrastructure</strong>: Docker, Kubernetes, AWS EKS</li>
  <li><strong>Networking</strong>: Nginx Ingress, Load Balancer</li>
  <li><strong>Monitoring</strong>: Prometheus, Grafana</li>
</ul>

---

<h2>Installation</h2>

<h3>Local Development (Laravel Sail)</h3>
<ol>
  <li>Clone repository:
    <pre>git clone https://github.com/your-org/hospital-management.git
cd hospital-management</pre>
  </li>
  <li>Install dependencies:
    <pre>composer install
npm install</pre>
  </li>
  <li>Configure environment:
    <pre>cp .env.example .env
./vendor/bin/sail up -d</pre>
  </li>
  <li>Run migrations:
    <pre>./vendor/bin/sail artisan migrate --seed</pre>
  </li>
  <li>Start development server:
    <pre>./vendor/bin/sail npm run dev</pre>
  </li>
</ol>

<h3>Docker Compose Setup</h3>
<pre>
docker-compose up -d --build
docker-compose exec app composer install
docker-compose exec app npm install && npm run build
docker-compose exec app php artisan migrate --seed
</pre>

---

<h2>Production Deployment</h2>

<h3>AWS EKS Cluster Setup</h3>
<ol>
  <li>Create EKS cluster:
    <pre>eksctl create cluster \
--name hospital-prod \
--version 1.27 \
--region us-west-2 \
--nodegroup-name workers \
--node-type t3.medium \
--nodes 3</pre>
  </li>
  
  <li>Deploy NGINX Ingress:
    <pre>helm repo add ingress-nginx https://kubernetes.github.io/ingress-nginx
helm install ingress-nginx ingress-nginx/ingress-nginx</pre>
  </li>
</ol>

<h3>Kubernetes Manifests</h3>
<p>Deployment manifests located in <code>deploy/kubernetes/</code>:</p>
<ul>
  <li><code>app-deployment.yaml</code> - Laravel application</li>
  <li><code>web-deployment.yaml</code> - Frontend assets</li>
  <li><code>mysql-statefulset.yaml</code> - Database</li>
  <li><code>ingress.yaml</code> - Routing rules</li>
</ul>

<pre>
kubectl apply -f deploy/kubernetes/
</pre>

<h3>CI/CD Pipeline</h3>
<p>Sample GitHub Actions workflow (<code>.github/workflows/deploy.yml</code>):</p>
<pre>
name: Deploy to EKS

on:
  push:
    branches: [ main ]

jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - name: Checkout code
        uses: actions/checkout@v3
        
      - name: Configure AWS credentials
        uses: aws-actions/configure-aws-credentials@v2
        with:
          aws-access-key-id: ${{ secrets.AWS_ACCESS_KEY_ID }}
          aws-secret-access-key: ${{ secrets.AWS_SECRET_ACCESS_KEY }}
          aws-region: us-west-2

      - name: Deploy to EKS
        run: |
          aws eks update-kubeconfig --name hospital-prod
          kubectl apply -f deploy/kubernetes/
</pre>

---

<h2>Architecture</h2>
<p align="center">
  <img src="docs/architecture.png" alt="System Architecture" width="600">
</p>

<h3>Key Components</h3>
<ul>
  <li><strong>API Gateway</strong>: Nginx ingress controller</li>
  <li><strong>Application Layer</strong>: Laravel microservices</li>
  <li><strong>Data Layer</strong>: MySQL cluster with Redis caching</li>
  <li><strong>Monitoring</strong>: Prometheus metrics collection</li>
  <li><strong>Auto-Scaling</strong>: Cluster auto-scaler for EKS nodes</li>
</ul>

---

<h2>Development Guidelines</h2>

<h3>Branch Strategy</h3>
<ul>
  <li><code>main</code> - Production releases</li>
  <li><code>develop</code> - Integration branch</li>
  <li><code>feature/*</code> - New features</li>
  <li><code>hotfix/*</code> - Critical fixes</li>
</ul>

<h3>Testing</h3>
<pre>
# Run PHP tests
./vendor/bin/sail test

# Run Frontend tests
npm run test

# Generate coverage report
npm run test:coverage
</pre>

---

<h2>Monitoring & Logging</h2>
<ul>
  <li>Prometheus metrics endpoint: <code>/metrics</code></li>
  <li>Grafana dashboard: <code>http://monitoring.example.com</code></li>
  <li>Centralized logs with ELK Stack</li>
  <li>Application logs: <code>storage/logs/laravel.log</code></li>
</ul>

---

<h2>Contributing</h2>
<p>See <a href="CONTRIBUTING.md">CONTRIBUTING.md</a> for detailed guidelines.</p>

<h2>License</h2>
<p>MIT License - See <a href="LICENSE">LICENSE</a></p>

<h2>Contact</h2>
<p>
  Maintainer: Mubarak Louis<br>
  Email: mubaraklouis@gmail.com<br>
  Incident Response: #support-channel in Slack
</p>

<ul>
  <li><strong>GitHub Issues</strong>: <a href="https://github.com/your-username/hospital-management-system/issues" target="_blank">Report Bugs</a>
  <li><strong>Live Support</strong>: <a href="https://hospital-system.example.com/support" target="_blank">Chat Support</a></li>
</ul>

---

<h2>Screenshots</h2>
<p align="center">
    
<img width="1920" alt="Screen Shot 2025-04-01 at 1 31 11 PM" src="https://github.com/user-attachments/assets/04185e12-eb2b-4172-97bb-cff46d13f2f3" />


<img width="1920" alt="Screen Shot 2025-04-01 at 1 30 35 PM" src="https://github.com/user-attachments/assets/d345e108-32ad-453b-aabc-527b80e677c0" />


</p>
