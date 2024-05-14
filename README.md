// Serialization :
Le processus de conversion des objets de ton application en un format spécifique (comme JSON ou XML).

// Deserialization:
Le processus inverse, où les données dans un format spécifique -> en objets.


-- Normalization -> on récupère les données de la bdd et on veut les rendre disponibles via notre API.
-- Denormalization -> lorsque on reçoit des données dans le cadre d'une requête API et qu'on veut les traiter dans notre app (modification)

-- Serialization : La sérialisation est un terme générique qui fait référence au processus de normalisation et de dénormalization. Cela inclut la conversion d'objets en données structurées (normalisation) ainsi que la conversion de données structurées en objets (dénormalisation).


///2/// Comment appliquer la sérialisation à nos ressources et opérations ?
avec le Groups et normalizationContext/denormalizationContext
- Par défaut on a seulement les Uri

///3/// Le ContextBuilder et le Normalizer :

Personnaliser les champs retournés en fonction d'une variable ou d'un élément spécifique.
Cette personnalisation peut être effectuée en utilisant deux mécanismes principaux :

-- le ContextBuilder pour personnaliser la sortie en fonction de la requête HTTP 

exemple :  exclure certains champs de la réponse en fonction de paramètres de requête spécifiques.

--  le Normalizer pour personnaliser la sortie en fonction des données elles-mêmes.
exemple :  exclure certains champs de la réponse en fonction des propriétés de l'objet.


///4// Les Décorateurs : plus tard

///5// Validation :
ça permet de s'assurer que les données entrantes respectent certaines règles et contraintes avant d'être traitées ou enregistrées dans la base de données. comment c'est utilisé ? (cf Product.php)
y'a deux manières de faire :
- validation par groupe d'opération (on applique la validation sur un groupe d'opérations)
- validation personnalisé

///6// Filtres :

///7/// JSON-LD :


///8/// Pagination :

///7/// Sub-Ressource :





