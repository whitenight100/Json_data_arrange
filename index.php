<html data-fr-theme="" lang="fr">
    <head>
        <style>
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            .mat-typography {
                flex: 1;
            }

             @media (max-width: 600px) {
            .mat-table {
                display: block;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            } 
            .mat-table .mat-cell {
                flex-basis: 100%;
                max-width: 100%;
                box-sizing: border-box;
                padding: 8px;
                word-break: break-word;
            }

            .mat-table .mat-column-nom,
            .mat-table .mat-column-prenoms,
            .mat-table .mat-column-resultat {
                flex-basis: 33.33%;
                max-width: 33.33%;
            }
            }

        </style>
       <script>
            document.addEventListener('DOMContentLoaded', function() {
                var searchInput = document.getElementById('search-input');
                searchInput.addEventListener('input', search);

                // Other JavaScript code
            });

            function search() {
                var searchQuery = document.getElementById('search-input').value;
                var table = document.querySelector('.mat-table');
                var tbody = table.querySelector('tbody');

                if (searchQuery != '') {
                    // Send AJAX request to fetchData.php
                    fetch('fetchData.php?search=' + searchQuery)
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        // Clear previous results
                        tbody.innerHTML = '';


                        console.log(data.results);
                        // Display new results or show "No data" message
                        if (Array.isArray(data.results)) {
                            
                            table.style.display = ''; // Show the table
                            tbody.style.display = ''; // Show the tbody
                            // Sort the results by "nom" field
                            // Filter the results based on the searchQuery
                            var searchResults = data.results.filter(function (result) {
                                return result.nom.toLowerCase().includes(searchQuery.toLowerCase());
                            });

                            // Sort the results based on the occurrence of the keyword within the "nom" field
                            searchResults.sort(function (a, b) {
                                var aIndex = a.nom.toLowerCase().indexOf(searchQuery.toLowerCase());
                                var bIndex = b.nom.toLowerCase().indexOf(searchQuery.toLowerCase());

                                // If the keyword is found in both names
                                if (aIndex !== -1 && bIndex !== -1) {
                                    // Sort based on the index of the keyword
                                    return aIndex - bIndex;
                                }
                                // If the keyword is only found in one name
                                else if (aIndex !== -1) {
                                    // Place the name containing the keyword first
                                    return -1;
                                }
                                else if (bIndex !== -1) {
                                    // Place the name containing the keyword first
                                    return 1;
                                }
                                // If the keyword is not found in either name
                                else {
                                    // Sort alphabetically
                                    return a.nom.localeCompare(b.nom);
                                }
                            });
                            searchResults.forEach(function (result) {
                                var row = document.createElement('tr');
                                row.classList.add('mat-row');
                                row.setAttribute('role', 'row');

                                var nomCell = document.createElement('td');
                                nomCell.classList.add('mat-cell', 'centerText');
                                nomCell.textContent = result.nom;
                                row.appendChild(nomCell);

                                var prenomsCell = document.createElement('td');
                                prenomsCell.classList.add('mat-cell', 'centerText');
                                prenomsCell.textContent = result.prenoms;
                                row.appendChild(prenomsCell);

                                var resultatCell = document.createElement('td');
                                resultatCell.classList.add('mat-cell', 'centerText');
                                resultatCell.textContent = result.resultat;
                                row.appendChild(resultatCell);

                                // Append the row to the table body
                                tbody.appendChild(row);
                            });
                        } else {
                            table.style.display = 'none'; // Hide the table
                            tbody.style.display = 'none'; // Hide the tbody
                            var noDataRow = document.createElement('tr');
                            noDataRow.classList.add('mat-row', 'mat-no-data-row');
                            noDataRow.setAttribute('role', 'row');

                            var noDataCell = document.createElement('td');
                            noDataCell.classList.add('mat-cell', 'centerText');
                            noDataCell.setAttribute('colspan', '3');
                            noDataCell.textContent = 'Aucun résultat trouvé.';
                            noDataRow.appendChild(noDataCell);

                            // Append the "No data" row to the table body
                            tbody.appendChild(noDataRow);
                        }
                    })
                    .catch(function (error) {
                        console.error('An error occurred during the AJAX request:', error);
                    });
                }
            }   

        </script>

        <meta charset="utf-8" />
        <meta
            content="publication,bac,baccalauréat,examen,concours,résultat,2023,Aix-Marseille,Amiens,Besançon,Bordeaux,Clermont-Ferrand,Corse,Créteil,Dijon,Grenoble,Lille,Limoges,Lyon,Montpellier,Nancy-Metz,Nantes,Normandie,Nice,Orléans-Tours,Paris,Poitiers,Reims,Rennes,Strasbourg,Toulouse,Versailles"
            name="keywords"
        />
        <title>Publication des résultats, Cyclades</title>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link href="styles.css" rel="stylesheet" />
    </head>

    <body class="mat-typography">
        <app-root _nghost-mhb-c20="" ng-version="15.2.9">
            <div _ngcontent-mhb-c20="" id="body">
                <div _ngcontent-mhb-c20="" id="center">
                    <app-header _ngcontent-mhb-c20="">
                        <header class="fr-header" role="banner">
                            <div class="fr-header__body">
                                <div class="fr-container">
                                    <div class="fr-header__body-row">
                                        <div class="fr-header__brand fr-enlarge-link">
                                            <div class="fr-header__brand-top">
                                                <div class="fr-header__logo"><p class="fr-logo"></p></div>
                                            </div>
                                            <div class="fr-header__service">
                                                <a href="/candidat/publication/" title="Accueil - Cyclades - Publication (Education national)"><p class="fr-header__service-title">Publication / Cyclades</p></a>
                                                <p class="fr-header__service-tagline">Gestion des examens et concours</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                    </app-header>
                    <div _ngcontent-mhb-c20="" role="alert">
                        <!-- -->
                        <main _ngcontent-mhb-c20="" id="router">
                            <router-outlet _ngcontent-mhb-c20=""></router-outlet>
                            <app-admissibilite _nghost-mhb-c45="">
                                <div _ngcontent-mhb-c45="" class="fr-container--no-gutters">
                                    <app-contexte _ngcontent-mhb-c45="" _nghost-mhb-c44="">
                                        <div _ngcontent-mhb-c44="" class="fr-container">
                                            <nav _ngcontent-mhb-c44="" aria-label="Menu principal" class="fr-nav" id="header-navigation" role="navigation">
                                                <ul _ngcontent-mhb-c44="" class="fr-nav__list">
                                                    <li _ngcontent-mhb-c44="" class="fr-nav__item"><a _ngcontent-mhb-c44="" aria-current="page" class="fr-nav__link" href="/candidat/publication/DNB/A24" target="_self">Accueil</a></li>
                                                </ul>
                                            </nav>
                                            <h1 _ngcontent-mhb-c44="">Académie de Créteil - DIPLÔME NATIONAL DU BREVET</h1>
                                            <p _ngcontent-mhb-c44="">2023 - Session Normale</p>
                                            <h2 _ngcontent-mhb-c44="">Résultats - Session Normale</h2>
                                            <!-- --><!-- --><!-- --><!-- --><!-- -->
                                        </div>
                                    </app-contexte>
                                    <div _ngcontent-mhb-c45="">
                                        <!-- --><!-- -->
                                        <app-recherche-admis-long _ngcontent-mhb-c45="">
                                            <div class="fr-container">
                                                <div class="fr-grid-row">
                                                    <div class="fr-col-12">
                                                        <form class="ng-untouched ng-pristine ng-valid" novalidate="">
                                                            <div class="input-group bd-search">
                                                               
                                                                    <div _ngcontent-mhb-c6="" class="fr-input-group">
                                                                        <label _ngcontent-mhb-c6="" class="fr-label" for="fieldzqkz8b-input" id="fieldx9hwox-label">
                                                                            Saisissez le nom des candidats dont vous voulez connaître le résultat. <abbr _ngcontent-mhb-c6="" title="Requis">*</abbr>
                                                                            <!-- --><!-- -->
                                                                            <span _ngcontent-mhb-c6="" class="fr-hint-text">Si vous tapez moins de 4 lettres, seuls les noms exacts seront recherchés.</span>
                                                                            <!-- -->
                                                                        </label>
                                                                        <div _ngcontent-mhb-c6="">
                                                                            <input
                                                                                aria-labelledby="fieldgikub9-label"
                                                                                class="fr-input ng-untouched ng-pristine ng-invalid"
                                                                                placeholder="SEARCH"
                                                                                type="text"
                                                                                id="search-input"
                                                                            />

                                                                            <!-- -->
                                                                        </div>
                                                                    </div>
                                                                </exaco-input>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="fr-col-12">
                                                        <div class="consulterNoteText"><div></div></div>
                                                        <!-- -->
                                                        <div class="fr-table fr-table--layout-fixed">
                                                            <table class="mat-table cdk-table" mat-table="" role="table" >
                                                                <thead role="rowgroup">
                                                                    <tr class="mat-header-row cdk-header-row" mat-header-row="" role="row">
                                                                        <th class="mat-header-cell cdk-header-cell cdk-column-nom mat-column-nom" mat-header-cell="" role="columnheader">Nom</th>
                                                                        <th class="mat-header-cell cdk-header-cell cdk-column-prenoms mat-column-prenoms" mat-header-cell="" role="columnheader">Prénoms</th>
                                                                        <th class="mat-header-cell cdk-header-cell cdk-column-resultat mat-column-resultat" mat-header-cell="" role="columnheader">Résultat</th>
                                                                        <!-- -->
                                                                    </tr>
                                                                    <!-- -->
                                                                </thead>
                                                                <tbody role="rowgroup" >
                                                                    <?php
                                                                       
                                                                        // Fetch data from the URL
                                                                        // $json = file_get_contents('https://bobigny-republique.college/json.json');

                                                                        // // Decode JSON data
                                                                        // $data = json_decode($json, true);

                                                                        // // Get search term from query parameter
                                                                        // $search = $_GET['search'] ?? '';

                                                                        // // Filter results based on the search term
                                                                        // $results = array_filter($data['results'], function ($result) use ($search) {
                                                                        //     return strpos(strtolower($result['nom']), strtolower($search)) !== false
                                                                        //         || strpos(strtolower($result['prenom']), strtolower($search)) !== false;
                                                                        // });

                                                                        // Display the search results in the table
                                                                        // if (!empty($results)) {
                                                                        //     foreach ($results as $result) {
                                                                                // echo '<tr class="mat-row" role="row">';
                                                                                // echo '<td class="mat-cell centerText">' . $result['nom'] . '</td>';
                                                                                // echo '<td class="mat-cell centerText">' . $result['prenoms'] . '</td>';
                                                                                // echo '<td class="mat-cell centerText">' . $result['resultat'] . '</td>';
                                                                            
                                                                                // echo '</tr>';
                                                                        //     }
                                                                        // } else {
                                                                            // echo '<tr class="mat-row mat-no-data-row" role="row">';
                                                                            // echo '<td class="mat-cell centerText" colspan="3">Aucun résultat trouvé.</td>';
                                                                            // echo '</tr>';
                                                                        // }
                                                                    ?>
                                                                    <!-- -->
                                                                    <tr class="mat-row mat-no-data-row" role="row">
                                                                        <td class="mat-cell centerText" colspan="3">Veuillez saisir un nom dans le champ de recherche</td>
                                                                    </tr>
                                                                    <!-- -->
                                                                </tbody>
                                                                <tfoot class="mat-table-sticky" role="rowgroup" style="display: none; bottom: 0px; z-index: 10;">
                                                                    <!-- -->
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- -->
                                        </app-recherche-admis-long>
                                        <!-- -->
                                    </div>
                                </div>
                            </app-admissibilite>
                            <!-- -->
                        </main>
                        <app-footer _ngcontent-mhb-c20="" _nghost-mhb-c18="">
                            <footer _ngcontent-mhb-c18="" class="fr-footer" id="footer" role="contentinfo">
                                <div _ngcontent-mhb-c18="" class="fr-container">
                                    <div _ngcontent-mhb-c18="" class="fr-footer__body">
                                        <div _ngcontent-mhb-c18="" class="fr-footer__brand fr-enlarge-link">
                                            <a _ngcontent-mhb-c18="" href="/candidat/publication/" title="Accueil - Cyclades - Publication (Education national)"><p _ngcontent-mhb-c18="" class="fr-logo">Publication / Cyclades</p></a>
                                        </div>
                                        <div _ngcontent-mhb-c18="" class="fr-footer__content">
                                            <ul _ngcontent-mhb-c18="" class="fr-footer__content-list">
                                                <li _ngcontent-mhb-c18="" class="fr-footer__content-item"><a _ngcontent-mhb-c18="" class="fr-footer__content-link" href="https://legifrance.gouv.fr" target="_blank">legifrance.gouv.fr</a></li>
                                                <li _ngcontent-mhb-c18="" class="fr-footer__content-item"><a _ngcontent-mhb-c18="" class="fr-footer__content-link" href="https://gouvernement.fr" target="_blank">gouvernement.fr</a></li>
                                                <li _ngcontent-mhb-c18="" class="fr-footer__content-item"><a _ngcontent-mhb-c18="" class="fr-footer__content-link" href="https://service-public.fr" target="_blank">service-public.fr</a></li>
                                                <li _ngcontent-mhb-c18="" class="fr-footer__content-item"><a _ngcontent-mhb-c18="" class="fr-footer__content-link" href="https://data.gouv.fr" target="_blank">data.gouv.fr</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div _ngcontent-mhb-c18="" class="fr-footer__bottom">
                                        <ul _ngcontent-mhb-c18="" class="fr-footer__bottom-list">
                                            <li _ngcontent-mhb-c18="" class="fr-footer__bottom-item"><a _ngcontent-mhb-c18="" class="fr-footer__bottom-link" href="#">Accessibilité : non conforme</a></li>
                                            <li _ngcontent-mhb-c18="" class="fr-footer__bottom-item">
                                                <a _ngcontent-mhb-c18="" class="fr-footer__bottom-link" href="https://cyclades.education.gouv.fr/cyccandidat/aide/MENTIONS_LEGALES/MENTIONS_LEGALES.htm">Mentions légales</a>
                                            </li>
                                        </ul>
                                        <div _ngcontent-mhb-c18="" class="fr-footer__bottom-copy"><p _ngcontent-mhb-c18="">© Ministère de l'éducation nationale, Cyclades - Publication 5.4.8 - Tous droits réservés</p></div>
                                    </div>
                                </div>
                            </footer>
                        </app-footer>
                    </div>
                    <!-- -->
                </div>
            </div>
        </app-root>
        <script src="runtime.bfe6273f585a2850.js" type="module"></script>
        <script src="polyfills.10d855a09f3c85e4.js" type="module"></script>
        <script src="main.a858ab681f68239d.js" type="module"></script>
    </body>
</html>
