# Readmit - Guía rápida para levantar este proyecto Laravel

## ⚙️ Requisitos

- Docker y Docker Compose instalados
- Git instalado
- No necesitás PHP ni Composer localmente (todo corre con Sail)

---

## 🧱 1. Clonar el proyecto

```bash
git clone https://github.com/usuario/proyecto-1.git
cd proyecto-1

##🛠️  2. Copiar archivo de entorno
bash
Copiar
Editar
cp .env.example .env

💡 Si .env.example está vacío o con SQLite, asegurate de tener algo así:

dotenv
Copiar
Editar
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password

##🐳 3. Levantar los contenedores
bash
Copiar
Editar
./vendor/bin/sail up -d
🔁 Esperá unos segundos a que todos los servicios estén levantados.

##🗝️ 4. Generar clave de la app
bash
Copiar
Editar
./vendor/bin/sail artisan key:generate

##🧩 5. Migrar la base de datos
bash
Copiar
Editar
./vendor/bin/sail artisan migrate
📢 Si dice “Nothing to migrate”, está todo OK.

##🌐 6. Acceder a la app
Abrí tu navegador y andá a:

arduino
Copiar
Editar
http://localhost
http://localhost/tareas
