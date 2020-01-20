<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141207476-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-141207476-1');
    </script>
	<script>
	<?php
	if(!empty($_GET['show'])){
	?>
	show = "<?php echo urldecode($_GET['show']); ?>";
	<?php
	}
	?>

	<?php
	if(!empty($_GET['hide'])){
	?>
	hide = "<?php echo urldecode($_GET['hide']); ?>";
	<?php
	}
	?>

	</script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/balls.css?t=14">
    <link rel="stylesheet" href="css/body.css?t=11">
    <link rel="stylesheet" href="css/stats.css?t=15">
    <link rel="stylesheet" href="css/mountains.css?t=11">

    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/balls.js?t=19"></script>
    <script type="text/javascript" src="js/stats.js?t=14"></script>
    <script type="text/javascript" src="js/kin-sdk.min.js?t=7"></script>
    <script type="text/javascript" src="js/kin-blockchain.js?t=16"></script>

    <title>Kin Transaction Viewer</title>
    <meta property="og:title" content="Kin Transaction Visualizer" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://kin-bubbles.herokuapp.com/" />
    <meta property="og:image" content="https://i.imgur.com/XdCpItI.png" />
    <meta property="og:description"
          content="Transaction visualizer for the Kin blockchain" />
</head>
<body class="normal">
    <div class="container-fluid">
        <div class="row">

            <div id="kin">
                <div>

                    <a style="display:inline-flex;" href="https://www.kin.org/" target="_blank">
                        <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iNjRweCIgaGVpZ2h0PSI2NHB4IiB2aWV3Qm94PSIwIDAgNjQgNjQiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogU2tldGNoIDUzLjIgKDcyNjQzKSAtIGh0dHBzOi8vc2tldGNoYXBwLmNvbSAtLT4KICAgIDx0aXRsZT5UZXN0IDM8L3RpdGxlPgogICAgPGRlc2M+Q3JlYXRlZCB3aXRoIFNrZXRjaC48L2Rlc2M+CiAgICA8ZGVmcz4KICAgICAgICA8cGF0aCBkPSJNMjQ3LjUzMjk3MywyMTkuNDQzNTMyIEMyNDcuNTMyOTczLDIyMC4zMTc5MTQgMjQ2LjgyNjIyOCwyMjEuMDI3MDggMjQ1Ljk1NDE0MywyMjEuMDI3MDggTDI0NC40Nzk1MjYsMjIxLjAyNzA4IEMyNDIuODk0NTIzLDIyMS4wMjcwOCAyNDEuNjEwMTgsMjIyLjMxNTQxNCAyNDEuNjEwMTgsMjIzLjkwNDUzIEwyNDEuNjA0NjEyLDIyMy45MDQ1MyBDMjQxLjYwNDYxMiwyMjUuNDkzNzY3IDI0My4wNzgwMTgsMjI2Ljc4MjEwMiAyNDQuNjYzMDIxLDIyNi43ODIxMDIgTDI0NS45NjYxMjYsMjI2Ljc4MjEwMiBDMjQ2LjgzMTMxMSwyMjYuNzgyMTAyIDI0Ny41MzI5NzMsMjI3LjQ4NTQ1NyAyNDcuNTMyOTczLDIyOC4zNTI0NTcgTDI0Ny41MzI5NzMsMjMyLjY4NjQ4NiBMMjQzLjE3MDg1NCwyMzIuNjg2NDg2IEMyNDIuMzA1NTQ4LDIzMi42ODY0ODYgMjQxLjYwNDYxMiwyMzEuOTgzMDA5IDI0MS42MDQ2MTIsMjMxLjExNTQwNSBMMjQxLjYwNDYxMiwyMjkuNjY0NjM2IEMyNDEuNjA0NjEyLDIyOC4wNzYwMDQgMjQwLjI2NzAxMiwyMjYuNzM0NDEzIDIzOC42ODIwMDgsMjI2LjczNDQxMyBMMjM4LjY4MjAwOCwyMjYuNzI4NjAzIEMyMzcuMDk2ODgzLDIyNi43Mjg2MDMgMjM1Ljg2NDgyOSwyMjguMTM0NTg3IDIzNS44NjQ4MjksMjI5LjgwOTAzNSBMMjM1Ljg2NDgyOSwyMzEuMTI4NDc3IEMyMzUuODY0ODI5LDIzMS45ODg2OTggMjM1LjE2OTM0LDIzMi42ODY0ODYgMjM0LjMxMDkzMiwyMzIuNjg2NDg2IEwyMzAuNDM3NTY4LDIzMi42ODY0ODYgTDIzMC40Mzc1NjgsMjE1LjE1NzkxOCBMMjM0LjM0MjUyMywyMTUuMTU3OTE4IEMyMzUuMTgzMDE3LDIxNS4xNTc5MTggMjM1Ljg2NDgyOSwyMTUuODQwOTM5IDIzNS44NjQ4MjksMjE2LjY4NDA5NCBMMjM1Ljg2NDgyOSwyMTguMTQ5NjI5IEMyMzUuODY0ODI5LDIxOS43Mzg2MjQgMjM3LjIyOTU0MiwyMjEuMTA3MDg2IDIzOC44MTQ1NDYsMjIxLjEwNzA4NiBDMjQwLjM5OTQyOCwyMjEuMTA3MDg2IDI0MS42MDQ2MTIsMjE5LjczODYyNCAyNDEuNjA0NjEyLDIxOC4xNDk2MjkgTDI0MS42MDQ2MTIsMjE2Ljc0MDg2MSBDMjQxLjYwNDYxMiwyMTUuODY2NDc4IDI0Mi4zMTEyMzcsMjE1LjE1NzkxOCAyNDMuMTgzMzIxLDIxNS4xNTc5MTggTDI0Ny41MzI5NzMsMjE1LjE1NzkxOCBMMjQ3LjUzMjk3MywyMTkuNDQzNTMyIFogTTI2NC4zNTUwNzMsMjE5LjcxNzA3OSBDMjYzLjUwNjM0OCwyMTYuOTU1OTQ2IDI2Mi4xMzczOTksMjE0LjU3NTcyMiAyNTcuNzA5MzE0LDIxMC4xODIyNjMgTDI1Mi42NzA0NjcsMjA1LjE4Mjg4NSBDMjQ4LjI0MjM4MiwyMDAuNzg5MzA1IDI0NS44NTE1MDIsMTk5LjQzOTEyIDI0My4wODM4MjgsMTk4LjYxMjE4NCBDMjQwLjMxNjE1MywxOTcuNzg1MTI3IDIzNy40ODkwNDksMTk3Ljc5NjE0MiAyMzQuNzI3OTExLDE5OC42NDQ4NjQgQzIzMS45NjY3NzMsMTk5LjQ5MzU4NyAyMjkuNTg2NTQ0LDIwMC44NjI0MTIgMjI1LjE5MzA3NiwyMDUuMjkwNjEgTDIyMC4xODI5MTUsMjEwLjM0MDIxOSBDMjE1Ljc4OTMyNiwyMTQuNzY4Mjk1IDIxNC40MzkxMzgsMjE3LjE1OTE3IDIxMy42MTIwOCwyMTkuOTI2ODM5IEMyMTIuNzg1MTQyLDIyMi42OTQ1MDcgMjEyLjc5NjE1NywyMjUuNTIxNzI3IDIxMy42NDQ4ODEsMjI4LjI4MjczOCBDMjE0LjQ5MzYwNiwyMzEuMDQzOTkyIDIxNS44NjI1NTUsMjMzLjQyNDA5NSAyMjAuMjkwNzYxLDIzNy44MTc2NzUgTDIyNS4zMjk0ODcsMjQyLjgxNjkzMiBDMjI5Ljc1NzY5MywyNDcuMjEwNTEyIDIzMi4xNDg0NTIsMjQ4LjU2MDgxOSAyMzQuOTE2MjQ4LDI0OS4zODc4NzUgQzIzNy42ODM5MjIsMjUwLjIxNDkzMiAyNDAuNTExMDI2LDI1MC4yMDM3OTcgMjQzLjI3MjE2NCwyNDkuMzU1MDc0IEMyNDYuMDMzMTgxLDI0OC41MDYzNTEgMjQ4LjQxMzQxLDI0Ny4xMzc0MDUgMjUyLjgwNjk5OSwyNDIuNzA5MjA4IEwyNTcuODE3MTYsMjM3LjY1OTcyIEMyNjIuMjEwNjI4LDIzMy4yMzE1MjIgMjYzLjU2MDgxNiwyMzAuODQwNjQ3IDI2NC4zODc4NzQsMjI4LjA3Mjk3OCBDMjY1LjIxNDkzMywyMjUuMzA1MzEgMjY1LjIwMzc5NywyMjIuNDc4MjExIDI2NC4zNTUwNzMsMjE5LjcxNzA3OSBMMjY0LjM1NTA3MywyMTkuNzE3MDc5IFoiIGlkPSJwYXRoLTEiPjwvcGF0aD4KICAgICAgICA8ZmlsdGVyIHg9Ii0xNy4zJSIgeT0iLTE3LjMlIiB3aWR0aD0iMTM0LjYlIiBoZWlnaHQ9IjEzNC42JSIgZmlsdGVyVW5pdHM9Im9iamVjdEJvdW5kaW5nQm94IiBpZD0iZmlsdGVyLTIiPgogICAgICAgICAgICA8ZmVPZmZzZXQgZHg9IjAiIGR5PSIwIiBpbj0iU291cmNlQWxwaGEiIHJlc3VsdD0ic2hhZG93T2Zmc2V0T3V0ZXIxIj48L2ZlT2Zmc2V0PgogICAgICAgICAgICA8ZmVHYXVzc2lhbkJsdXIgc3RkRGV2aWF0aW9uPSIzIiBpbj0ic2hhZG93T2Zmc2V0T3V0ZXIxIiByZXN1bHQ9InNoYWRvd0JsdXJPdXRlcjEiPjwvZmVHYXVzc2lhbkJsdXI+CiAgICAgICAgICAgIDxmZUNvbG9yTWF0cml4IHZhbHVlcz0iMCAwIDAgMCAwLjA5NzkzOTMxMTYgICAwIDAgMCAwIDAuMDk3OTM5MzExNiAgIDAgMCAwIDAgMC4wOTc5MzkzMTE2ICAwIDAgMCAwLjg2NTA4NDEzNSAwIiB0eXBlPSJtYXRyaXgiIGluPSJzaGFkb3dCbHVyT3V0ZXIxIj48L2ZlQ29sb3JNYXRyaXg+CiAgICAgICAgPC9maWx0ZXI+CiAgICA8L2RlZnM+CiAgICA8ZyBpZD0iU3ltYm9scyIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPGcgaWQ9ImxvZ29zIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMjA3LjAwMDAwMCwgLTE5Mi4wMDAwMDApIj4KICAgICAgICAgICAgPGcgaWQ9IlRlc3QtMyI+CiAgICAgICAgICAgICAgICA8dXNlIGZpbGw9ImJsYWNrIiBmaWxsLW9wYWNpdHk9IjEiIGZpbHRlcj0idXJsKCNmaWx0ZXItMikiIHhsaW5rOmhyZWY9IiNwYXRoLTEiPjwvdXNlPgogICAgICAgICAgICAgICAgPHVzZSBmaWxsPSIjRkZGRkZGIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHhsaW5rOmhyZWY9IiNwYXRoLTEiPjwvdXNlPgogICAgICAgICAgICA8L2c+CiAgICAgICAgPC9nPgogICAgPC9nPgo8L3N2Zz4=" alt="Icon" class="styles__icon-unbmdd-3 eJKLbX">
                    </a>
                    <span class="header">
                        <h2>Kin Transactions</h2>
                        <span class="donate">
                            Donate: <span class="address">GCHWKVWCZDIUNRQSEH7QY3RSKSHD3FCX5AGJZOPGZ3VEQQRAWVPRK52P</span>
                        </span>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">

            <div id="stats">
                <div id="spends" class="statbar stats clearfix " data-percent="30%">
                    <div class="stats-title" style="background: royalblue;"><span>Earn+Spends:</span></div>
                    <div class="stats-bar" style="background: royalblue;"></div>
                    <div id="spends_percent" class="stats-bar-percent">Initializing...</div>
                </div>
                <div id="accounts" class="statbar stats clearfix " data-percent="30%">
                    <div class="stats-title" style="background: royalblue;"><span>New Accts:</span></div>
                    <div class="stats-bar" style="background: royalblue;"></div>
                    <div id="accounts_percent" class="stats-bar-percent">Initializing...</div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="text-light small" id="details" style="z-index:100;">
                Mountain size = transaction dominance.
                <a style="text-decoration:underline;" class="text-muted" href="https://public.tableau.com/profile/kinfoundation#!/vizhome/Kinecosystemstats/Kinecosystemstats"
                   target="_blank">See official stats</a>
                <br />
                <a style="text-decoration:underline;" class="text-muted" href="http://bitcoin.interaqt.nl/kin.html"
                   target="_blank">Kin Circles (alt. visualizer)</a>
                <br />
                <a style="text-decoration:underline;" class="text-muted" href="https://play.google.com/store/apps/details?id=com.oneminja.catpurse"
                   target="_blank">
                    <img class="img-thumbnail" src="img/catpurse.png" style="height: 37px; padding:0px;">
                </a>
				<a style="text-decoration:underline;" class="text-muted" href="https://chrome.google.com/webstore/detail/tipster/mbblfalbndfkpfnlimjnaooandenimpj"
                   target="_blank">
                    <img class="img-thumbnail" src="img/tipster.png" style="height: 37px; padding:0px;">
                </a>
            </div>
        </div>
        <div class="row">
            <div id="balls">
                <div class="mountain-1">
                    <div class="mountain-top">
                        <span id="m1" class="app-mountain">...</span>
                        <div class="mountain-cap-1"></div>
                        <div class="mountain-cap-2"></div>
                        <div class="mountain-cap-3"></div>
                    </div>
                </div>
                <div class="mountain-2">
                    <div class="mountain-top">
                        <span id="m2" class="app-mountain">...</span>
                        <div class="mountain-cap-1"></div>
                        <div class="mountain-cap-2"></div>
                        <div class="mountain-cap-3"></div>
                    </div>
                </div>
                <div class="mountain-3">
                    <div class="mountain-top">
                        <span id="m3" class="app-mountain">...</span>
                        <div class="mountain-cap-1"></div>
                        <div class="mountain-cap-2"></div>
                        <div class="mountain-cap-3"></div>
                    </div>
                </div>
                <div class="mountain-4">
                    <div class="mountain-top">
                        <span id="m4" class="app-mountain">...</span>
                        <div class="mountain-cap-1"></div>
                        <div class="mountain-cap-2"></div>
                        <div class="mountain-cap-3"></div>
                    </div>
                </div>
                <div class="mountain-5">
                    <div class="mountain-top">
                        <span id="m5" class="app-mountain">...</span>
                        <div class="mountain-cap-1"></div>
                        <div class="mountain-cap-2"></div>
                        <div class="mountain-cap-3"></div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</body>
</html>
