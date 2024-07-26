DB_NAME="shop_offer.db"

REPERTOIRE="database"

FICHIER="database.sqlite"

CHEMIN="$REPERTOIRE/$FICHIER"

# Vérifica se SQLite3 é già installqto
if ! command -v sqlite3 &> /dev/null; then
  echo "Installation de SQLite3..."
  sudo apt install sqlite3
else
  echo "SQLite3 é già installato."
fi

if [ ! -d "$REPERTOIRE" ]; then
  mkdir -p "$REPERTOIRE"
  echo "Il repertorio '$REPERTOIRE' é stato creato."
fi

if [ -f "$CHEMIN" ]; then
  echo "Il file '$CHEMIN' esiste già."
else
  touch "$CHEMIN"
  echo "Il file '$CHEMIN' é stato creato con successo."
fi