# TaskFlow

TaskFlow è una web application full stack per la gestione di task e workflow, ispirata a strumenti come Asana.

L’applicazione è progettata con architettura client-server e utilizza API REST per la gestione dei dati, simulando il funzionamento di un sistema reale di task management.

---

## 🚀 Features

- Creazione e gestione task
- Organizzazione per progetti e workflow
- Aggiornamento stato task (To Do, In Progress, Done)
- CRUD completo
- Comunicazione client-server tramite API REST
- Sistema di autenticazione utenti (Laravel Breeze)
- Protezione delle rotte tramite autenticazione

---

## 🛠️ Tech Stack

### Frontend
- HTML
- CSS / SCSS
- JavaScript

### Backend
- Laravel
- MySQL

### Tools
- Git & GitHub
- Postman

---

## 🧠 Architettura

Il progetto è suddiviso in due parti principali:

- **Client** → gestione interfaccia utente  
- **Server** → gestione logica applicativa e API  

Questa separazione riflette un’architettura tipica delle applicazioni moderne basate su API.

---

## ⚙️ Funzionalità tecniche

- API REST per la gestione dei task  
- Operazioni CRUD complete  
- Gestione stato task  
- Struttura modulare backend  
- Connessione e gestione database  

---

## 📦 Installazione

### Backend

```bash
cd server
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## 📸 Screenshots

### Dashboard
Panoramica generale dell’applicazione.

<p align="center">
  <img src="screenshots/dashboard.png" width="700"/>
</p>

---

### Task List
Visualizzazione dei task organizzati per progetto.

<p align="center">
  <img src="screenshots/task_list.png" width="700"/>
</p>

---

### Create Task
Creazione di un nuovo task.

<p align="center">
  <img src="screenshots/new_task.png" width="700"/>
</p>

---

### Update Task
Modifica e aggiornamento dei task.

<p align="center">
  <img src="screenshots/update_task.png" width="700"/>
</p>

---

### Login
Accesso all'applicazione.

<p align="center">
  <img src="screenshots/login.png" width="700"/>
</p>

---

### Register
Registrazione di un nuovo utente.
<p align="center">
  <img src="screenshots/register.png" width="700"/>
</p>

---

### Admin User Management
Gestione degli utenti da parte dell'amministratore.
<p align="center">
  <img src="screenshots/users_list.png" width="700"/>
</p>