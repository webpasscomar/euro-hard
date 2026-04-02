# CLAUDE.md

@AGENTS.md

## Docker

El proyecto corre en Docker con `docker compose`.

- Build: `docker compose build`
- Levantar: `docker compose up -d`
- Logs: `docker compose logs -f app`
- El contenedor de app expone el puerto **8000**, phpMyAdmin en **8080**.
- El `.env` dentro del contenedor se genera desde `.env.example` durante el build.
- `vendor/`, `node_modules/` y `public/build` están protegidos por volúmenes anónimos — no los pisa el bind mount.
