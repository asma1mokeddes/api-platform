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

-- le ContextBuilder pour personnaliser la sortie en fonction de la requête HTTP  -> 1 seul fois (appelé en premier)

exemple :  exclure certains champs de la réponse en fonction de paramètres de requête spécifiques.
( quand l'utilisateur est connecté tu rajoutes qqchose)

--  le Normalizer pour personnaliser la sortie en fonction des données elles-mêmes. -> nbr de rep
exemple :  exclure certains champs de la réponse en fonction des propriétés de l'objet.


///4// Les Décorateurs : plus tard

///5/// Validation :
ça permet de s'assurer que les données entrantes respectent certaines règles et contraintes avant d'être traitées ou enregistrées dans la base de données. comment c'est utilisé ? (cf Product.php)
y'a deux manières de faire :
- validation par groupe d'opération (on applique la validation sur un groupe d'opérations)
- validation personnalisé (function)

///6/// Filtres : comment les utiliser et comment créer des filtres personnalisés?
Api plateform fournit des fct de filtres 

- Filtres prédéfinis : (dates, créneaux etc)
-- SearchFilter : Permet de rechercher des valeurs partielles dans les champs de texte. Les options disponibles incluent partial, start, end et word_start.
-- DateFilter : Permet de filtrer les dates en fonction de critères tels que after, before, strictly_after et strictly_before.
-- BooleanFilter : Permet de filtrer les valeurs booléennes (true, false, 1, 0).
-- NumericFilter : Permet de filtrer les valeurs numériques.
-- RangeFilter : Permet de filtrer les valeurs numériques dans une plage spécifiée, avec des options comme lt (inférieur à), gt (supérieur à), lte (inférieur ou égal à), gte (supérieur ou égal à) et between.
-- RegexFilter : Permet de filtrer les valeurs en utilisant des expressions régulières.
-- OrderFilter : Permet de trier les résultats.
+ filtre personalisé 

/// 7 /// JSON-LD :
c'est une syntaxe puissante et flexible pour représenter des données
- Le type de ressource : Dans JSON-LD, chaque ressource est typiquement identifiée par un type. Par exemple, pour une ressource de type Product, le JSON-LD pourrait inclure un champ @type avec la valeur Product, indiquant ainsi le type de la ressource.

- Le lien de la ressource : Les liens permettent de naviguer entre différentes ressources. Dans la réponse JSON-LD, les liens sont souvent représentés sous forme de champs contenant des URL vers d'autres ressources liées.


/// 8 /// Pagination :
La pagination permet de diviser les résultats d'une collection en plusieurs pages. 

** Activation de la pagination : **
La pagination est activée par défaut pour toutes les collections. Chaque collection contient 30 éléments par page. on peut configurer l'activation de la pagination et le nombre d'éléments par page de plusieurs manières :

- Côté serveur : Fichier api_platform.yaml  (aciver ou désactiver la pagination globalement ou par ressource).

- Côté client :  Fichier api_platform.yaml  (configurer la valeur de pagination_client_enabled).
-> activer ou désactiver la pagination en ajoutant un paramètre GET personnalisé dans la requête. 

- Sur une opération :
#[ApiResource(
    operations: [
        new GetCollection(
            paginationEnabled: false
        )   
    ]
)]

** Réponse JSON de pagination : **
Lorsque on effectue une requête GET sur une collection contenant plus d'une page, API Platform renvoie une collection 'Hydra' -> document JSON(-LD) valide contenant les éléments de la page demandée ainsi que des métadonnées de pagination.

La réponse JSON de pagination comprend les éléments suivants :
hydra:member : Les éléments de la collection actuelle.
hydra:totalItems : Le nombre total d'éléments dans la collection.
hydra:view : Des liens hypermédia vers la première, la dernière, la suivante et la précédente page de la collection.



///7/// Sub-Ressource :
Une ressources qui n'a pas vocation à être récupérée seule 
Dépend (fonctionnellement) d'une autre ressource 






