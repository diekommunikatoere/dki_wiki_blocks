# DKI Wiki Blocks

Ein WordPress-Plugin, das speziell für das DKI Wiki entwickelt wurde. Es enthält Blöcke, die speziell für das DKI Wiki entwickelt wurden.

## Übersicht

- [Struktur](#struktur)
- [Entwicklung](#entwicklung)
- [Deployment](#deployment)

## Struktur

### Build

```plaintext
dki_wiki_blocks.php
└── /blocks
    └── /block-name
        ├── block-name.php
        └── /build  (Wird von @wordpress/wp-scripts 
                    via @wordpress/create-block erstellt)
```

### Dev

```plaintext
dki_wiki_blocks.php
└── /blocks
    └── /block-name
        ├── block-name.php
        ├── /src
        ├── /node_modules
        └── /build  (Wird von @wordpress/wp-scripts 
                    via @wordpress/create-block erstellt)
```

## Entwicklung

Generell ist zu empfehlen, die Entwicklungsumgebung lokal zu betreiben. Dafür bietet sich die Entwicklung mit [wp-env](https://developer.wordpress.org/block-editor/getting-started/devenv/get-started-with-wp-env/) an.

### Wordpress Dokumentation

- [Getting Started - wordpress.com](https://developer.wordpress.org/block-editor/tutorials/getting-started/)
- [Block API - wordpress.com](https://developer.wordpress.org/block-editor/reference-guides/block-api/)

### Setup - Änderungen

1. Repository `dev` klonen
2. Mit `cd` in den Ordner navigieren
   1. Vorlage Steven: `cd /Users/ssullivan/webdev/dki/dki_wiki_blocks/blocks/block-name`
   2. Vorlage Jörg: `cd /xxxxxxxx/dki_wiki_blocks/blocks/block-name`
3. `npm install` ausführen
4. `npm start` ausführen

### Setup - Neuer Block

1. Repository `dev` klonen
2. Mit `cd` in den Ordner navigieren
   1. Vorlage Steven: `cd /Users/ssullivan/webdev/dki/dki_wiki_blocks/blocks`
   2. Vorlage Jörg: `cd /xxxxxxxx/dki_wiki_blocks/blocks`
3. `npx @wordpress/create-block@latest` ausführen
   1. Normale Version: `npx @wordpress/create-block block-name`
   2. Interaktive Version: `npx @wordpress/create-block@latest`
4. `cd block-name` ausführen
5. `npm start` ausführen

## Deployment

1. Änderungen in `dev` testen
2. `npm run build` ausführen
3. Änderungen in `dev` committen
4. In `main` wechseln
5. `git pull` ausführen
6. `git merge dev` ausführen
7. `git push` ausführen
