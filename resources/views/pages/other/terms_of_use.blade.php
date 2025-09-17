@extends('layouts.login_master')

@section('content')

    <div class="page-content">
        <div class="content-wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title font-weight-bold text-center">CONDITIONS D'UTILISATION</h1>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div style="font-size: 16px;" class="col-md-10 offset-md-1">
                                <p>@copyright 2025</p>

                                <h4 class="font-weight-semibold">Acceptation des conditions d'utilisation</h4>

                                <p>Ces conditions d'utilisation sont conclues entre Vous et {{ $app_name }} ("nous"). Les conditions suivantes et tous les documents incorporés par référence (collectivement, "Conditions d'utilisation"), régissent votre accès et votre utilisation de <a target="_blank" href="{{ $app_url }}">{{ $app_url }}</a>, y compris tout contenu, fonctionnalité et service proposé sur ou via <a target="_blank" href="{{ $app_url }}">{{ $app_url }}</a> (le "Site Web").</p>

                                <p>Veuillez lire attentivement les Conditions d'utilisation avant de commencer à utiliser le Site Web. En utilisant le Site Web, vous acceptez d'être lié par ces Conditions d'utilisation et notre Politique de confidentialité, disponible à <a target="_blank" href="{{ route('privacy_policy') }}">{{ route('privacy_policy') }}</a>, incorporée ici par référence. Si vous ne souhaitez pas accepter ces Conditions d'utilisation ou la Politique de confidentialité, vous ne devez pas accéder ou utiliser le Site Web.</p>

                                <h4 class="font-weight-semibold">Modifications des conditions d'utilisation</h4>

                                <p>Nous pouvons réviser et mettre à jour ces Conditions d'utilisation à tout moment à notre seule discrétion. Toutes les modifications prennent effet immédiatement dès leur publication. Cependant, toute modification des dispositions relatives au règlement des litiges énoncées dans la section Droit applicable et juridiction ne s'appliquera pas aux litiges pour lesquels les parties ont eu connaissance avant la date de publication sur le Site Web.</p>

                                <p>Votre utilisation continue du Site Web après la publication des Conditions d'utilisation révisées signifie que vous acceptez et consentez aux modifications. Vous êtes invité à consulter régulièrement cette page afin d'être informé de tout changement, car ils vous engagent.</p>

                                <h4 class="font-weight-semibold">Accès au Site Web et sécurité du compte</h4>
                                <p>Nous nous réservons le droit de retirer ou de modifier ce Site Web, ainsi que tout service ou matériel que nous fournissons sur le Site Web, à notre seule discrétion et sans préavis. Nous ne serons pas responsables si, pour une raison quelconque, tout ou partie du Site Web est indisponible à tout moment ou pour toute période. De temps à autre, nous pouvons restreindre l'accès à certaines parties du Site Web, ou à l'ensemble du Site Web, aux utilisateurs.</p>

                                <h3>Article I</h3>
                                <p>Vous êtes responsable de :</p>

                                <ul>
                                    <li>Prendre toutes les dispositions nécessaires pour avoir accès au Site Web.</li>
                                    <li>Veiller à ce que toutes les personnes qui accèdent au Site Web via votre connexion Internet soient informées de ces Conditions d'utilisation et s'y conforment.</li>
                                </ul>

                                <p>Pour accéder au Site Web ou à certaines des ressources qu'il offre, il se peut que vous deviez fournir certains détails d'enregistrement ou d'autres informations. Il est condition de votre utilisation du Site Web que toutes les informations que vous fournissez sur le Site Web soient correctes, actuelles et complètes. Vous acceptez que toutes les informations que vous fournissez pour vous inscrire sur ce Site Web ou autrement, y compris mais sans s'y limiter par le biais de l'utilisation de fonctionnalités interactives sur le Site Web, sont régies par notre Politique de confidentialité, et vous consentez à toutes les actions que nous entreprenons concernant vos informations conformément à notre Politique de confidentialité.</p>

                                <p>Si vous choisissez, ou si on vous fournit, un nom d'utilisateur, un mot de passe ou toute autre information dans le cadre de nos procédures de sécurité, vous devez traiter ces informations comme confidentielles, et vous ne devez les divulguer à aucune autre personne ou entité. Vous reconnaissez également que votre compte est personnel et vous vous engagez à ne pas fournir à une autre personne l'accès à ce Site Web ou à des parties de celui-ci en utilisant votre nom d'utilisateur, votre mot de passe ou d'autres informations de sécurité. Vous acceptez de nous informer immédiatement de tout accès non autorisé à ou utilisation de votre nom d'utilisateur ou mot de passe ou de toute autre violation de la sécurité. Vous vous engagez également à vous assurer que vous vous déconnectez de votre compte à la fin de chaque session. Vous devez faire preuve d'une prudence particulière lorsque vous accédez à votre compte depuis un ordinateur public ou partagé afin que d'autres ne puissent pas voir ou enregistrer votre mot de passe ou d'autres informations personnelles.</p>

                                <p>Nous avons le droit de désactiver tout nom d'utilisateur, mot de passe ou autre identifiant, qu'il soit choisi par vous ou fourni par nous, à tout moment à notre seule discrétion pour une raison ou une autre, y compris si, à notre avis, vous avez violé une disposition des présentes Conditions d'utilisation.</p>

                                <h4 class="font-weight-semibold">Droits de propriété intellectuelle</h4>

                               <p>Le Site Web et l'ensemble de son contenu, fonctionnalités et fonctionnalités (y compris mais sans s'y limiter toutes les informations, logiciels, textes, affichages, images, vidéos et audios, et la conception, la sélection et l'arrangement de ceux-ci), sont la propriété de nous, de nos concédants ou d'autres fournisseurs de tels matériaux et sont protégés par les lois américaines et internationales sur le droit d'auteur, les marques, les brevets, les secrets commerciaux et d'autres droits de propriété intellectuelle ou exclusifs.</p>

                                <p>Ces Conditions d'utilisation vous permettent d'utiliser le Site Web uniquement pour votre usage personnel et non commercial. Vous ne devez pas reproduire, distribuer, modifier, créer des œuvres dérivées, afficher publiquement, exécuter publiquement, republier, télécharger, stocker ou transmettre tout matériel de notre Site Web en violation de toute loi.</p>

                                <p>Vous ne devez pas accéder ou utiliser à des fins commerciales une partie quelconque du Site Web ou des services ou matériaux disponibles par le biais du Site Web.</p>

                                <h4 class="font-weight-semibold">Marques commerciales</h4>

                                <p>Le nom {{ $app_name }} et tous les noms, logos, slogans, devises et conceptions associés sont des marques commerciales nous appartenant ou appartenant à nos affiliés ou concédants. Vous ne devez pas utiliser de telles marques sans notre autorisation écrite préalable. Tous les autres noms, logos, noms de produits et de services, conceptions et slogans figurant sur ce Site Web sont des marques commerciales de leurs propriétaires respectifs.</p>

                                <h4 class="font-weight-semibold">Utilisations interdites</h4>

                                <ul>
                                    <li>Vous ne pouvez utiliser le Site Web que pour des fins légales et conformément à ces Conditions d'utilisation. Vous acceptez de ne pas utiliser le Site Web :</li>
                                    <li>De quelque manière que ce soit qui viole toute loi ou réglementation fédérale, étatique, locale ou internationale applicable (y compris, sans limitation, toute loi concernant l'exportation de données ou de logiciels vers et depuis les États-Unis ou d'autres pays).</li>
                                    <li>Dans le but d'exploiter, de nuire ou de tenter d'exploiter ou de nuire à des mineurs de quelque manière que ce soit en les exposant à un contenu inapproprié, en demandant des informations personnellement identifiables ou autrement.</li>
                                    <li>Pour envoyer, recevoir, télécharger, utiliser ou réutiliser tout matériel qui ne respecte pas les Normes de contenu énoncées dans ces Conditions d'utilisation.</li>
                                    <li>Pour transmettre, ou procurer l'envoi de, tout matériel publicitaire ou promotionnel sans notre consentement écrit préalable, y compris tout "courrier indésirable", "lettre en chaîne" ou "spam" ou toute autre sollicitation similaire.</li>
                                    <li>Pour usurper l'identité ou tenter d'usurper l'identité de nous, d'un de nos employés, d'un autre utilisateur ou de toute autre personne ou entité (y compris, sans limitation, en utilisant des adresses e-mail ou des noms d'écran associés à l'un des précédents).</li>
                                    <li>Pour participer à toute autre conduite qui restreint ou empêche l'utilisation ou le plaisir du Site Web par quiconque, ou qui, selon nous, peut nous nuire ou nuire aux utilisateurs du Site Web ou les exposer à une responsabilité.</li>
                                </ul>

                                <h4 class="font-weight-semibold">De plus, vous acceptez de ne pas :</h4>
                                <ul>
                                    <li>Utiliser le Site Web de quelque manière que ce soit qui pourrait désactiver, surcharger, endommager ou altérer le site ou interférer avec l'utilisation par une autre partie du Site Web, y compris sa capacité à participer à des activités en temps réel par le biais du Site Web.</li>
                                    <li>Utiliser tout robot, araignée ou autre dispositif, processus ou moyen automatique pour accéder au Site Web à des fins quelconques, y compris le suivi ou la copie de tout matériel sur le Site Web.</li>
                                    <li>Utiliser tout processus manuel pour surveiller ou copier tout matériel sur le Site Web ou pour toute autre fin non autorisée sans notre consentement écrit préalable.</li>
                                    <li>Utiliser tout dispositif, logiciel ou routine qui interfère avec le bon fonctionnement du Site Web.</li>
                                    <li>Introduire des virus, chevaux de Troie, vers, bombes logiques ou tout autre matériel qui est malveillant ou technologiquement nuisible.</li>
                                    <li>Tenter d'accéder de manière non autorisée, d'interférer avec, d'endommager ou de perturber toute partie du Site Web, le serveur sur lequel le Site Web est stocké, ou tout serveur, ordinateur ou base de données connecté au Site Web.</li>
                                    <li>Attaquer le Site Web via une attaque par déni de service ou une attaque par déni de service distribué.</li>
                                    <li>Utiliser le Site Web de quelque manière que ce soit qui viole toute politique, règle ou procédure {{ $app_name }} applicable.</li>
                                    <li>Utiliser le Site Web de quelque manière que ce soit qui contrevient à la tradition, à la foi et à la morale catholiques ou à l'héritage de l'éducation catholique de la miséricorde.</li>
                                    <li>Tenter autrement d'interférer avec le bon fonctionnement du Site Web.</li>
                                </ul>

                                <h4 class="font-weight-semibold">Contributions des utilisateurs</h4>

                                <p>Le Site Web peut contenir des tableaux d'affichage, des salles de chat, des pages ou profils web personnels, des forums, des tableaux d'annonces et d'autres fonctionnalités interactives (collectivement, "Services interactifs") qui permettent aux utilisateurs de publier, soumettre, publier, afficher ou transmettre à d'autres utilisateurs ou d'autres personnes (ci-après, "publier") du contenu ou des matériaux (collectivement, "Contributions des utilisateurs") sur ou par le biais du Site Web.</p>

                                <p>Toutes les Contributions des utilisateurs doivent être conformes aux Normes de contenu énoncées dans ces Conditions d'utilisation.</p>

                                <p>Toute Contribution des utilisateurs que vous publiez sur le site sera considérée comme non confidentielle et non propriétaire. En fournissant toute Contribution des utilisateurs sur le Site Web, vous nous accordez, ainsi qu'à nos licenciés, successeurs et ayants droit, le droit d'utiliser, de reproduire, de modifier, d'exécuter, d'afficher, de distribuer et de divulguer autrement à des tiers tout matériel de ce type.</p>

                                <p>Vous déclarez et garantissez que :</p>

                                <ul>
                                    <li>Vous possédez ou contrôlez tous les droits sur et à propos des Contributions des utilisateurs et avez le droit d'accorder la licence accordée ci-dessus à nous et à nos licenciés, successeurs et ayants droit.</li>
                                    <li>Toutes vos Contributions des utilisateurs sont et seront conformes à ces Conditions d'utilisation.</li>
                                </ul>

                                <p>Vous comprenez et reconnaissez que vous êtes responsable de toute Contribution des utilisateurs que vous soumettez ou contribuez, et vous, et non nous, avez l'entière responsabilité de ce contenu, y compris sa légalité, sa fiabilité, son exactitude et son adéquation.</p>

                                <p>Nous ne sommes pas responsables, ou responsables envers un tiers, du contenu ou de l'exactitude de toute Contribution des utilisateurs publiée par vous ou tout autre utilisateur du Site Web.</p>

                                <h4 class="font-weight-semibold">Surveillance et application ; Résiliation</h4>
                                <p>Nous avons le droit de :</p>

                                <ul>
                                    <li>Supprimer ou refuser de publier toute Contribution des utilisateurs pour une raison ou une autre à notre seule discrétion.</li>
                                    <li>Prendre toute mesure concernant toute Contribution des utilisateurs que nous jugeons nécessaire ou appropriée à notre seule discrétion, y compris si nous croyons que cette Contribution des utilisateurs viole les Conditions d'utilisation, y compris les Normes de contenu, enfreint tout droit de propriété intellectuelle ou autre droit de toute personne ou entité, menace la sécurité personnelle des utilisateurs du Site Web ou du public ou pourrait créer une responsabilité pour nous.</li>
                                    <li>Divulguer votre identité ou d'autres informations vous concernant à tout tiers qui prétend qu'un matériel publié par vous viole ses droits, y compris ses droits de propriété intellectuelle ou son droit à la vie privée.</li>
                                    <li>Prendre des mesures juridiques appropriées, y compris, sans limitation, un renvoi aux autorités judiciaires, pour toute utilisation illégale ou non autorisée du Site Web.</li>
                                    <li>Mettre fin ou suspendre votre accès à tout ou partie du Site Web pour une raison ou une autre, y compris, sans limitation, toute violation de ces Conditions d'utilisation.</li>
                                </ul>

                               <p> Sans limiter ce qui précède, nous avons le droit de coopérer pleinement avec toute autorité judiciaire ou ordonnance du tribunal demandant ou ordonnant la divulgation de l'identité ou d'autres informations de quiconque publiant des matériaux sur ou par le biais du Site Web.</p>

                                <p>VOUS RENONCEZ ET DÉGAGEZ {{ strtoupper($app_name) }} DE TOUTE RÉCLAMATION RÉSULTANT DE TOUTE ACTION ENTREPRISE PAR {{ strtoupper($app_name) }} PENDANT OU À LA SUITE DE SES ENQUÊTES ET DE TOUTES ACTIONS ENTREPRISES À LA SUITE D'ENQUÊTES PAR {{ strtoupper($app_name) }} OU DES AUTORITÉS JUDICIAIRES.</p>

                                <p>Cependant, nous ne nous engageons pas à examiner tout le matériel avant qu'il ne soit publié sur le Site Web, et ne pouvons garantir le retrait rapide de tout matériel objectionnable après sa publication. En conséquence, nous n'assumons aucune responsabilité pour toute action ou inaction concernant les transmissions, communications ou contenus fournis par tout utilisateur ou tiers. Nous n'avons aucune responsabilité ou obligation envers quiconque pour la performance ou la non-performance des activités décrites dans cette section.</p>

                                <h4 class="font-weight-semibold">Normes de contenu</h4>

                                <p>Ces normes de contenu s'appliquent à toutes les Contributions des utilisateurs et à l'utilisation des Services interactifs. Les Contributions des utilisateurs doivent, dans leur intégralité, être conformes à toutes les lois et réglementations fédérales, étatiques, locales et internationales applicables. Sans limiter ce qui précède, les Contributions des utilisateurs ne doivent pas :</p>

                                <ul>
                                    <li> Contenir tout matériel qui est diffamatoire, obscène, indécent, abusif, offensant, harcelant, violent, haineux, inflammatoire ou autrement objectionnable.</li>
                                    <li> Promouvoir du matériel sexuellement explicite ou pornographique, de la violence, ou de la discrimination fondée sur la race, le sexe, la religion, la nationalité, le handicap, l'orientation sexuelle ou l'âge.</li>
                                    <li> Enfreindre tout brevet, marque commerciale, secret commercial, droit d'auteur ou autre propriété intellectuelle ou autres droits de toute autre personne.</li>
                                    <li>Violer les droits légaux (y compris les droits de publicité et de confidentialité) des autres ou contenir tout matériel qui pourrait donner lieu à une responsabilité civile ou pénale en vertu des lois ou réglementations applicables ou qui pourrait autrement être en conflit avec ces Conditions d'utilisation et notre <a target="_blank" href="{{ route('privacy_policy') }}">Politique de confidentialité</a>.</li>
                                    <li>Être susceptible de tromper quiconque.</li>
                                    <li>Promouvoir toute activité illégale, ou plaider en faveur, promouvoir ou aider à tout acte illégal.</li>
                                    <li>Causer des ennuis, des inconvénients ou une anxiété inutile ou être susceptible de contrarier, embarrasser, alarmer ou ennuyer toute autre personne.</li>
                                    <li>Usurper l'identité de quiconque, ou déformer votre identité ou votre affiliation avec quiconque ou toute organisation.</li>
                                    <li>Impliquer des activités ou des ventes commerciales, telles que des concours, des tirages au sort et d'autres promotions de vente, du troc ou de la publicité.</li>
                                    <li>Donner l'impression qu'elles émanent de nous ou sont approuvées par nous ou par toute autre personne ou entité, si tel n'est pas le cas.</li>
                                </ul>

                                <h4 class="font-weight-semibold">Violation du droit d'auteur</h4>
                                <p>Si vous pensez que des Contributions des utilisateurs violent vos droits d'auteur, veuillez nous contacter</p>

                                <h5 class="font-weight-semibold">Confiance dans les informations publiées</h5>

                                <p>Les informations présentées sur ou par le biais du Site Web sont mises à disposition uniquement à des fins d'information générale. Nous ne garantissons pas l'exactitude, l'exhaustivité ou l'utilité de ces informations. Toute confiance que vous accordez à de telles informations est strictement à vos propres risques. Nous déclinons toute responsabilité découlant de toute confiance accordée à ces matériaux par vous ou tout autre visiteur du Site Web, ou par quiconque pouvant être informé de l'un de ses contenus.</p>

                                <p>Ce Site Web peut inclure du contenu fourni par des tiers, y compris des matériaux fournis par d'autres utilisateurs, blogueurs et tiers concédants, syndicateurs, agrégateurs et/ou services de reporting. Toutes les déclarations et/ou opinions exprimées dans ces matériaux, et tous les articles et réponses aux questions et autres contenus, autres que le contenu fourni par nous, sont uniquement les opinions et la responsabilité de la personne ou de l'entité fournissant ces matériaux. Ces matériaux ne reflètent pas nécessairement l'opinion de nous. Nous ne sommes pas responsables, ou responsables envers vous ou tout tiers, du contenu ou de l'exactitude de tout matériel fourni par des tiers.</p>

                                <h4 class="font-weight-semibold">Modifications du Site Web</h4>
                                <p>Nous pouvons mettre à jour le contenu de ce Site Web de temps à autre, mais son contenu n'est pas nécessairement complet ou à jour. Tout le matériel sur le Site Web peut être obsolète à tout moment donné, et nous ne sommes pas tenus de mettre à jour ce matériel.</p>

                                <p>Informations vous concernant et vos visites sur le Site Web</p>

                                <p>Toutes les informations que nous collectons sur ce Site Web sont soumises à notre Politique de confidentialité. En utilisant le Site Web, vous consentez à toutes les actions entreprises par nous concernant vos informations en conformité avec la <a target="_blank" href="{{ route('privacy_policy') }}">Politique de confidentialité</a>.</p>

                                <h3>Article II</h3>

                                <h4 class="font-weight-semibold">Liens vers le Site Web et fonctionnalités des médias sociaux</h4>

                                <p>Vous pouvez créer un lien vers notre page d'accueil, à condition de le faire d'une manière juste et légale et de ne pas nuire à notre réputation ou en tirer parti, mais vous ne devez pas établir de lien de manière à suggérer une forme d'association, d'approbation ou d'endorsement de notre part sans notre consentement écrit exprès.</p>

                                <p>Vous acceptez de coopérer avec nous pour supprimer tout lien que nous vous demandons. Nous nous réservons le droit de retirer l'autorisation de lien sans préavis.</p>

                                <p>Nous pouvons désactiver toutes ou certaines fonctionnalités de médias sociaux et tous les liens à tout moment sans préavis à notre discrétion.</p>

                                <h4 class="font-weight-semibold">Liens depuis le Site Web</h4>

                                <p>Si le Site Web contient des liens vers d'autres sites et ressources fournies par des tiers, ces liens sont fournis uniquement pour votre commodité. Cela inclut les liens contenus dans des publicités, y compris des bannières publicitaires et des liens sponsorisés. Nous n'avons aucun contrôle sur le contenu de ces sites ou ressources, et n'acceptons aucune responsabilité à leur égard ou pour toute perte ou dommage pouvant résulter de votre utilisation de ceux-ci. Si vous décidez d'accéder à l'un des sites tiers liés à ce Site Web, vous le faites entièrement à vos propres risques et sous réserve des conditions d'utilisation de tels sites.</p>

                                <h4 class="font-weight-semibold">Avertissement concernant les garanties</h4>

                                <p>Vous comprenez que nous ne pouvons pas et ne garantissons pas que les fichiers disponibles au téléchargement sur Internet ou sur le Site Web seront exempts de virus ou d'autres codes destructeurs. Vous êtes responsable de la mise en œuvre de procédures et de points de contrôle suffisants pour satisfaire à vos exigences particulières en matière de protection antivirus et d'exactitude des données d'entrée et de sortie, et de la maintenance d'un moyen externe à notre site pour toute reconstruction de toute donnée perdue. NOUS NE SERONS PAS RESPONSABLES DE TOUTE PERTE OU DOMMAGE CAUSÉ PAR UNE ATTAQUE PAR DÉNI DE SERVICE, DES VIRUS OU D'AUTRES MATÉRIAUX TECHNOLOGIQUEMENT NUISIBLES QUI PEUVENT INFECTER VOTRE ÉQUIPEMENT INFORMATIQUE, PROGRAMMES INFORMATIQUES, DONNÉES OU AUTRES MATÉRIAUX PROPRIÉTAIRES EN RAISON DE VOTRE UTILISATION DU SITE WEB OU DE TOUT SERVICE OU ARTICLE OBTENU PAR LE BIAIS DU SITE WEB OU DE VOTRE TÉLÉCHARGEMENT DE TOUT MATÉRIAU PUBLIÉ SUR CELUI-CI, OU SUR TOUT SITE WEB LIÉ À CELUI-CI.</p>

                                <p>VOTRE UTILISATION DU SITE WEB, DE SON CONTENU ET DE TOUT SERVICE OU ARTICLE OBTENU PAR LE BIAIS DU SITE WEB EST À VOS PROPRES RISQUES. LE SITE WEB, SON CONTENU ET TOUT SERVICE OU ARTICLE OBTENU PAR LE BIAIS DU SITE WEB SONT FOURNIS SUR UNE BASE "EN L'ÉTAT" ET "SELON DISPONIBILITÉ", SANS AUCUNE GARANTIE D'AUCUNE SORTE, EXPRESSE OU IMPLICITE. NI {{ strtoupper($app_name) }} NI QUICONQUE ASSOCIÉ À {{ strtoupper($app_name) }} NE FAIT AUCUNE GARANTIE OU REPRÉSENTATION EN CE QUI CONCERNE L'EXHAUSTIVITÉ, LA SÉCURITÉ, LA FIABILITÉ, LA QUALITÉ, L'EXACTITUDE OU LA DISPONIBILITÉ DU SITE WEB. SANS LIMITER CE QUI PRÉCÈDE, NI {{ strtoupper($app_name) }} NI QUICONQUE ASSOCIÉ À {{ strtoupper($app_name) }} NE REPRÉSENTE OU NE GARANTIT QUE LE SITE WEB, SON CONTENU OU TOUT SERVICE OU ARTICLE OBTENU PAR LE BIAIS DU SITE WEB SERA EXACT, FIABLE, SANS ERREUR OU ININTERROMPU, QUE LES DÉFAUTS SERONT CORRIGÉS, QUE NOTRE SITE OU LE SERVEUR QUI LE REND DISPONIBLE SONT EXEMPTS DE VIRUS OU D'AUTRES COMPOSANTS NUISIBLES OU QUE LE SITE WEB OU TOUT SERVICE OU ARTICLE OBTENU PAR LE BIAIS DU SITE WEB RÉPONDRA AUTREMENT À VOS BESOINS OU ATTENTES.</p>

                                <p>{{ strtoupper($app_name) }} DÉCLINE PAR LA PRÉSENTE TOUTE GARANTIE D'ANY SORTE, QU'ELLE SOIT EXPRESSE OU IMPLICITE, STATUTAIRE OU AUTRE, Y COMPRIS MAIS SANS S'Y LIMITER TOUTE GARANTIE DE NON-VIOLATION.</p>

                                <p>CE QUI PRÉCÈDE N'A PAS D'IMPACT SUR TOUTE GARANTIE QUI NE PEUT ÊTRE EXCLUE OU LIMITÉE EN VERTU DE LA LOI APPLICABLE.</p>

                                <h4 class="font-weight-semibold">Limitation de responsabilité</h4>

                                <p>EN AUCUN CAS {{ strtoupper($app_name) }}, SES AFFILIÉS OU LEURS CONCÉDANTS, FOURNISSEURS DE SERVICES, EMPLOYÉS, AGENTS, DIRIGEANTS OU ADMINISTRATEURS NE SERONT RESPONSABLES DE DOMMAGES D'ANY SORTE, SOUS AUCUNE THÉORIE JURIDIQUE, DÉCOULANT DE OU EN RELATION AVEC VOTRE UTILISATION, OU L'INCAPACITÉ À UTILISER, LE SITE WEB, TOUT SITE WEB LIÉ À CELUI-CI, TOUT CONTENU SUR LE SITE WEB OU DE TELS AUTRES SITES WEB OU TOUT SERVICE OU ARTICLE OBTENU PAR LE BIAIS DU SITE WEB OU DE TELS AUTRES SITES WEB, Y COMPRIS TOUT DOMMAGE DIRECT, INDIRECT, SPÉCIAL, ACCESSOIRE, CONSÉCUTIF OU PUNITIF, Y COMPRIS MAIS SANS S'Y LIMITER, LES BLESSURES PERSONNELLES, LA DOULEUR ET LA SOUFFRANCE, LE DISTRESS ÉMOTIONNEL, LA PERTE DE REVENUS, LA PERTE DE PROFITS, LA PERTE D'ENTREPRISE OU D'ÉCONOMIES ANTICIPÉES, LA PERTE D'UTILISATION, LA PERTE DE BONNE VOLONTÉ, LA PERTE DE DONNÉES, ET QUE CE SOIT CAUSÉ PAR UN DÉLIT (Y COMPRIS LA NÉGLIGENCE), UNE VIOLATION DE CONTRAT OU AUTRE, MÊME SI PRÉVISIBLE.</p>

                                <p>CE QUI PRÉCÈDE N'A PAS D'IMPACT SUR TOUTE RESPONSABILITÉ QUI NE PEUT ÊTRE EXCLUE OU LIMITÉE EN VERTU DE LA LOI APPLICABLE.</p>

                                <h4 class="font-weight-semibold">Indemnisation</h4>

                                <p>Vous acceptez de défendre, d'indemniser et de dégager de toute responsabilité {{ $app_name }}, ses affiliés, concédants et fournisseurs de services, ainsi que ses et leurs respectifs dirigeants, directeurs, employés, entrepreneurs, agents, concédants, fournisseurs, successeurs et ayants droit de et contre toute réclamation, responsabilité, dommage, jugement, récompense, perte, coût, dépense ou frais (y compris les honoraires d'avocat raisonnables) découlant de ou liés à votre violation de ces Conditions d'utilisation ou à votre utilisation du Site Web, y compris, mais sans s'y limiter, vos Contributions des utilisateurs, toute utilisation du contenu, des services et des produits du Site Web autre que celle expressément autorisée dans ces Conditions d'utilisation ou votre utilisation de toute information obtenue à partir du Site Web.</p>

                                <h4 class="font-weight-semibold">Droit applicable et juridiction</h4>

                                <p>Toutes les questions relatives au Site Web et à ces Conditions d'utilisation et tout litige ou réclamation en découlant ou y étant lié (dans chaque cas, y compris les litiges ou réclamations non contractuels), seront régies par et interprétées conformément aux lois du Nigeria sans donner effet à aucune disposition ou règle de choix ou de conflit de lois.</p>

                                <p>Tout procès, action ou procédure judiciaire découlant de, ou lié à, ces Conditions d'utilisation ou au Site Web devra être institué exclusivement devant les tribunaux fédéraux du Nigeria, bien que nous nous réservions le droit d'intenter toute action, procès ou procédure contre vous pour violation de ces Conditions d'utilisation dans votre pays de résidence ou tout autre pays pertinent. Vous renoncez à toute objection à l'exercice de la juridiction sur vous par de tels tribunaux et au lieu dans de tels tribunaux.</p>

                                <h4 class="font-weight-semibold">Arbitrage</h4>

                                <p>À la seule discrétion de {{ $app_name }}, il peut vous demander de soumettre tout litige découlant de l'utilisation de ces Conditions d'utilisation ou du Site Web, y compris les litiges découlant de ou concernant leur interprétation, violation, invalidité, non-performance ou résiliation, à un arbitrage final et contraignant en vertu de la Loi sur l'arbitrage et la conciliation du Nigeria</p>

                                <h4 class="font-weight-semibold">Limitation du délai de dépôt des réclamations</h4>

                                <p>TOUTE ACTION EN JUSTICE OU RÉCLAMATION QUE VOUS POURRIEZ AVOIR DÉCOULANT DE OU LIÉE À CES CONDITIONS D'UTILISATION OU AU SITE WEB DOIT ÊTRE COMMENCÉE DANS UN DÉLAI d'UN (1) AN APRÈS L'ACCRUAL DE L'ACTION EN JUSTICE, SANS QUOI, CETTE ACTION EN JUSTICE OU RÉCLAMATION EST DÉFINITIVEMENT BARRÉE.</p>

                                <h4 class="font-weight-semibold">Renonciation et divisibilité</h4>

                                <p>Aucune renonciation de {{ $app_name }} à un terme ou une condition énoncé dans ces Conditions d'utilisation ne sera considérée comme une renonciation supplémentaire ou continue de ce terme ou de cette condition ou une renonciation à tout autre terme ou condition, et tout manquement de {{ $app_name }} à faire valoir un droit ou une disposition en vertu de ces Conditions d'utilisation ne constituera pas une renonciation à ce droit ou à cette disposition.</p>

                                <p>Si une disposition de ces Conditions d'utilisation est jugée par un tribunal ou un autre tribunal compétent comme invalide, illégale ou inapplicable pour une raison quelconque, cette disposition sera éliminée ou limitée au minimum nécessaire de sorte que les dispositions restantes des Conditions d'utilisation continuent à avoir plein effet.</p>

                                <h4 class="font-weight-semibold">Intégralité de l'accord</h4>

                                <p>Ces Conditions d'utilisation et notre <a target="_blank" href="{{ route('privacy_policy') }}">Politique de confidentialité</a> constituent l'intégralité de l'accord entre vous et {{ $app_name }} en ce qui concerne le Site Web et remplacent tous les accords, représentations et garanties antérieurs et contemporains, écrits et oraux, en ce qui concerne le Site Web.</p>

                                <h5 class="font-weight-semibold">Vos commentaires et préoccupations</h5>
                                <p>Si vous avez des commentaires ou des préoccupations concernant mais sans s'y limiter ces Conditions d'utilisation. Veuillez nous contacter.</p>

                                <p>Ce site web est opéré par {{ $app_name }}.</p>

                                <p>Tous les autres retours, commentaires, demandes de support technique et autres communications relatives au Site Web doivent être dirigés vers l'administrateur de l'école. Veuillez appeler {{ $contact_phone }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
