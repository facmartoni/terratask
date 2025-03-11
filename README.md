# TerraTask

Offline task management Progressive Web Application (PWA) tailored for agriculture, built with Laravel, PHP, Alpine.js, and Livewire.

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Alpine.js-8BC0D0?style=flat&logo=alpine.js&logoColor=white" alt="Alpine.js">
  <img src="https://img.shields.io/badge/Livewire-4E56A6?style=flat&logo=livewire&logoColor=white" alt="Livewire">
  <img src="https://img.shields.io/badge/PWA-5A0FC8?style=flat&logo=pwa&logoColor=white" alt="PWA">
</p>

## Overview

TerraTask bridges a market gap by providing a scalable, cost-effective solution for local producers, replacing expensive English-language tools. Architected with a custom Service Worker, it ensures robust offline functionality for remote farming environments.

## Key Features

- **Offline-First Design**: Seamless task tracking in areas with limited connectivity.  
- **Task Creation**: Input title, description, priority, assigned user, geolocation (offline-capable), and preview photo.  
- **User Task Dashboard**: Displays assigned and created tasks with priority shading, user photos, and roles.  
- **Task Overview Dashboard**: Categorizes tasks by priority (green shades), includes author, assignee, photos, and filters.  
- **Real-Time Search**: Instant task and user search for efficient navigation.  

## Technical Details

- **Backend**: Laravel, PHP  
- **Frontend**: Alpine.js, Livewire  
- **Architecture**: PWA with custom Service Worker  
- **Target**: Agricultural productivity, offline usability  

## Achievements

- Enables reliable task management in remote farming settings.  
- Leverages Laravel’s ecosystem for scalability and security.  
- Delivers an affordable alternative to high-cost solutions.  

## Purpose

Designed to empower agricultural teams with a practical, accessible tool, TerraTask showcases advanced PWA development and offline capabilities for real-world impact.

## Getting Started

1. Clone the repo: `git clone https://github.com/facmartoni/terratask.git`  
2. Install dependencies: `composer install && npm install`  
3. Configure `.env` and run migrations: `php artisan migrate`  
4. Start the app: `php artisan serve`  

Built by Facundo García Martoni to solve real-world challenges with modern tech.
