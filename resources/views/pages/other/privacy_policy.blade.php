@extends('layouts.login_master')

@section('content')

<div class="page-content">
    <div class="content-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title font-weight-bold text-center">POLITIQUE DE CONFIDENTIALITÉ</h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div style="font-size: 16px;" class="col-md-10 offset-md-1">
                            <p>Dernière modification : 4 novembre 2019</p>

                            <h4 class="font-weight-semibold">Introduction</h4>

                            <p>{{ $app_name }} ("Nous") respecte votre vie privée et s'engage à la protéger conformément à cette politique.</p>

                            <p>Cette politique décrit les types d'informations que nous pouvons recueillir auprès de vous ou que vous pouvez fournir lorsque vous visitez le site web
                                <a target="_blank" href="{{ $app_url }}">{{ $app_url }}</a> (notre "Site Web") ainsi que nos pratiques concernant la collecte, l'utilisation, la conservation, la protection et la divulgation de ces informations.</p>

                            <p>Cette politique s'applique aux informations que nous recueillons :</p>

                            <ul>
                                <li>Sur ce Site Web.</li>
                                <li>Par e-mail, SMS et autres messages électroniques entre vous et ce Site Web.</li>
                            </ul>

                           <p> Veuillez lire attentivement cette politique pour comprendre nos pratiques concernant vos informations et la façon dont nous les traiterons. Si vous n'êtes pas d'accord avec nos politiques et pratiques, vous pouvez choisir de ne pas utiliser notre Site Web. En accédant ou en utilisant ce Site Web, vous acceptez cette politique de confidentialité. Cette politique peut être modifiée de temps à autre (voir Modifications de notre politique de confidentialité). Votre utilisation continue de ce Site Web après la publication des modifications vaut acceptation de ces modifications, veuillez donc consulter régulièrement la politique pour les mises à jour.</p>

                            <h4 class="font-weight-semibold">Enfants de moins de 13 ans</h4>

                           <p> Nous ne recueillons pas sciemment d'informations personnelles auprès d'enfants de moins de 13 ans. Si vous avez moins de 13 ans, n'indiquez aucune information sur ce Site Web ou via ses fonctionnalités sans le consentement préalable d'un parent. Si nous apprenons que nous avons recueilli ou reçu des informations personnelles d'un enfant de moins de 13 ans sans vérification du consentement parental, nous supprimerons ces informations. Si vous pensez que nous pourrions détenir des informations concernant un enfant de moins de 13 ans, veuillez appeler {{ $contact_phone }}</p>

                            <h4 class="font-weight-semibold">Informations que nous recueillons à votre sujet et comment nous les recueillons</h4>

                            <p>Nous recueillons plusieurs types d'informations auprès des utilisateurs de notre Site Web, notamment :</p>

                            <ul>
                                <li>par lesquelles vous pouvez être identifié personnellement ("informations personnelles") ;</li>
                                <li>qui vous concernent mais ne vous identifient pas individuellement ; et/ou</li>
                                <li>concernant votre connexion Internet, l'équipement que vous utilisez pour accéder à notre Site Web et les détails d'utilisation.</li>
                            </ul>

                            <p>Nous recueillons ces informations :</p>

                            <ul>
                                <li>Directement auprès de vous lorsque vous nous les fournissez.</li>
                                <li>Automatiquement au fur et à mesure que vous naviguez sur le site. Les informations collectées automatiquement peuvent inclure des détails d'utilisation, des adresses IP et des informations collectées par le biais de cookies ou d'autres technologies de suivi.</li>
                            </ul>

                            <h4 class="font-weight-semibold">Informations que vous nous fournissez. Les informations que nous recueillons sur ou par le biais de notre Site Web peuvent inclure :</h4>

                            <ul>
                                <li>Les informations que vous fournissez en remplissant des formulaires ou des enquêtes sur notre Site Web. Les informations personnelles soumises ne seront pas transférées à des tiers non affiliés, sauf indication contraire au moment de la collecte. Lorsque vous soumettez des informations personnelles, elles ne sont utilisées qu'aux fins indiquées au moment de la collecte.</li>
                                <li>Les dossiers et copies de votre correspondance (y compris les adresses e-mail), si vous nous contactez.</li>
                            </ul>

                            <h4 class="font-weight-semibold">Informations que nous recueillons par le biais de technologies de collecte de données automatiques :</h4>

                            <p>Au fur et à mesure que vous naviguez et interagissez avec notre Site Web, nous pouvons utiliser des technologies de collecte de données automatiques pour collecter certaines informations sur votre équipement, vos actions de navigation et vos habitudes, notamment :</p>

                            <ul>
                                <li>Les détails de vos visites sur notre Site Web, y compris les données de trafic, les données de localisation, les journaux et autres données de communication ainsi que les ressources auxquelles vous accédez et que vous utilisez sur le Site Web.</li>
                                <li>Des informations sur votre ordinateur et votre connexion Internet, y compris votre adresse IP, votre système d'exploitation et votre type de navigateur.</li>
                            </ul>

                            <p>Les informations que nous collectons automatiquement sont des données statistiques et peuvent inclure des informations personnelles. Nous pouvons les conserver ou les associer à des informations personnelles que nous collectons d'autres manières ou que nous recevons de tiers. Cela nous aide à améliorer notre Site Web et à fournir un service meilleur et plus personnalisé, notamment en nous permettant :</p>

                            <ul>
                                <li>Estimer la taille de notre audience et les modèles d'utilisation.</li>
                                <li>Accélérer vos recherches.</li>
                                <li>Vous reconnaître lorsque vous revenez sur notre Site Web.</li>
                            </ul>

                            <p>Les technologies que nous utilisons pour cette collecte automatique de données peuvent inclure :</p>

                            <ul>
                                <li><strong>Cookies</strong> (ou cookies de navigateur). Un cookie est un petit fichier placé sur le disque dur de votre ordinateur. Vous pouvez refuser d'accepter les cookies de navigateur en activant le paramètre approprié de votre navigateur. Cependant, si vous sélectionnez ce paramètre, vous pourriez ne pas être en mesure d'accéder à certaines parties de notre Site Web. À moins que vous n'ayez ajusté les paramètres de votre navigateur pour qu'il refuse les cookies, notre système émettra des cookies lorsque vous dirigerez votre navigateur vers notre Site Web.</li>
                                <li><strong>Cookies Flash.</strong> Certaines fonctionnalités de notre Site Web peuvent utiliser des objets stockés localement (ou cookies Flash) pour collecter et stocker des informations sur vos préférences et votre navigation vers, depuis et sur notre Site Web. Les cookies Flash ne sont pas gérés par les mêmes paramètres de navigateur que ceux utilisés pour les cookies de navigateur. Pour des informations sur la gestion de vos paramètres de confidentialité et de sécurité pour les cookies Flash, voir Choix concernant la façon dont nous utilisons et divulguons vos informations.</li>
                                <li><strong>Balises Web.</strong> Les pages de notre Site Web peuvent contenir de petits fichiers électroniques appelés balises web (également appelées gifs clairs, balises pixel et gifs à pixel unique) qui nous permettent, par exemple, de compter les utilisateurs qui ont visité ces pages et pour d'autres statistiques liées au site web (par exemple, enregistrement de la popularité de certains contenus du site web et vérification de l'intégrité du système et du serveur).</li>
                            </ul>

                            <h4 class="font-weight-semibold">Comment nous utilisons vos informations</h4>

                            <p>Nous utilisons les informations que nous recueillons à votre sujet ou que vous nous fournissez, y compris les informations personnelles :</p>

                            <ul>
                                <li>Pour présenter notre Site Web et son contenu.</li>
                                <li>Pour vous permettre de participer à des fonctionnalités interactives sur notre Site Web.</li>
                                <li>De toute autre manière que nous pouvons décrire lorsque vous fournissez les informations.</li>
                                <li>Pour toute autre finalité avec votre consentement.</li>
                            </ul>

                            <h4 class="font-weight-semibold">Divulgation de vos informations</h4>

                            <p>Nous pouvons divulguer des informations agrégées sur nos utilisateurs, ainsi que des informations qui n'identifient aucun individu, sans restriction.</p>

                            <p>Nous pouvons divulguer des informations personnelles que nous recueillons ou que vous fournissez comme décrit dans cette politique de confidentialité :</p>

                            <ul>
                                <li>Pour satisfaire à la finalité pour laquelle vous les avez fournies.</li>
                                <li>Pour toute autre finalité divulguée par nos soins lorsque vous fournissez les informations.</li>
                                <li>Avec votre consentement.</li>
                            </ul>

                            <p>Nous pouvons également divulguer vos informations personnelles :</p>

                            <ul>
                                <li>Pour nous conformer à toute ordonnance judiciaire, loi ou procédure légale, y compris pour répondre à toute demande gouvernementale ou réglementaire.</li>
                                <li>Pour faire respecter ou appliquer nos <a target="_blank" href="{{ route('terms_of_use') }}">Conditions d'utilisation</a>.</li>
                                <li>Si nous pensons que la divulgation est nécessaire ou appropriée pour protéger nos droits, notre propriété ou la sécurité de nos étudiants ou d'autres personnes.</li>
                            </ul>

                            <h4 class="font-weight-semibold">Choix concernant la façon dont nous utilisons et divulguons vos informations</h4>
                            <p>Nous nous efforçons de vous offrir des choix concernant les informations personnelles que vous nous fournissez. Nous avons créé des mécanismes pour vous offrir le contrôle suivant sur vos informations :</p>

                            <ul>
                                <li><strong>Technologies de suivi et publicité</strong>. Vous pouvez configurer votre navigateur pour qu'il refuse tous les cookies de navigateur ou certains d'entre eux, ou pour qu'il vous alerte lorsque des cookies sont envoyés. Pour savoir comment vous pouvez gérer vos paramètres de cookies Flash, visitez la page des paramètres du lecteur Flash sur le site web d'Adobe. Si vous désactivez ou refusez les cookies, veuillez noter que certaines parties de ce site peuvent alors être inaccessibles ou ne pas fonctionner correctement.</li>
                            </ul>

                            <h4 class="font-weight-semibold">Sécurité des données</h4>

                            <p>Nous avons mis en œuvre des mesures conçues pour sécuriser vos informations personnelles contre toute perte accidentelle et contre tout accès, utilisation, altération et divulgation non autorisés.</p>

                            <h4 class="font-weight-semibold">Modifications de notre politique de confidentialité</h4>

                           <p>Notre politique est de publier toute modification apportée à notre politique de confidentialité sur cette page. Si nous apportons des modifications importantes à la façon dont nous traitons les informations personnelles de nos utilisateurs, nous vous en informerons par un avis sur la page d'accueil du Site Web. La date de la dernière révision de la politique de confidentialité est indiquée en haut de la page. Vous êtes responsable de la visite périodique de notre Site Web et de cette politique de confidentialité pour vérifier les éventuelles modifications.</p>

                            <h4 class="font-weight-semibold">Informations de contact</h4>

                            <p>Pour poser des questions ou faire des commentaires sur cette politique de confidentialité et nos pratiques en matière de confidentialité, veuillez appeler {{ $contact_phone }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>
</div>
@endsection
