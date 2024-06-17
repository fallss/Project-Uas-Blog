<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            overflow: hidden;
        }
        .header, .footer {
            text-align: center;
            padding: 20px;
            z-index: 10;
            position: relative;
        }
        .robot {
            text-align: center;
            margin-top: 50px;
            z-index: 10;
            position: relative;
        }
        .content {
            margin-top: 50px;
            z-index: 10;
            position: relative;
        }
        #scene-container {
            width: 100vw;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
        }
        .product-section {
            background-color: #000;
            color: #fff;
            padding: 50px 0;
        }
        .product-section .product {
            margin-bottom: 30px;
        }
        .product-section .product h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .product-section .product p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .product-section .btn {
            color: #fff;
            border: 1px solid #fff;
            text-decoration: none;
            padding: 10px 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div id="scene-container"></div>
    <div class="container">
        <div class="header">
            <h1>ChainGPT</h1>
            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Our Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Solutions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Developers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Learn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light " href="#">Community</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light btn btn-outline-light" href="#">Launch DApp</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="robot">
            {{-- <img src="{{ asset('assets/laravel.png') }}" alt="Robot"> --}}
        </div>
        <div class="content text-center">
            <h2>Provide me with a daily crypto market analysis report.</h2>
            <p>How to deploy a smart contract on the Ethereum blockchain?</p>
            <h3>Unleash the Power of Blockchain AI</h3>
        </div>
        <div class="footer">
            <p>Your personal expert in all crypto</p>
        </div>
    </div>
    <div class="container-fluid product-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 product">
                    <h2>AI Models & Tools</h2>
                    <p>ChainGPT offers advanced AI models and tools explicitly designed for Web3, Blockchain, and Crypto use cases.</p>
                </div>
                <div class="col-md-6 product">
                    <h2>$CGPT Utility Token</h2>
                    <p>$CGPT is the utility token behind the ChainGPT ecosystem. It is ultimately how individuals and businesses access the AI models, Pad, API, and DAO.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 product">
                    <h2>Staking & Farming</h2>
                    <p>Staking CGPT tokens unlocks multiple benefits, such as APY earnings, tier on ChainGPT Pad, DAO voting power, exclusive airdrops, NFT releases, and additional perks within the ChainGPT ecosystem.</p>
                    <a href="#" class="btn">Enter Staking Dashboard</a>
                </div>
                <div class="col-md-6 product">
                    <h2>DAO Voting</h2>
                    <p>ChainGPT Governance enables $CGPT holders to influence the ecosystem through a DAO, where they can propose, vote, and allocate funds.</p>
                    <a href="#" class="btn">Enter DAO App</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        // Set up the scene, camera, and renderer
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('scene-container').appendChild(renderer.domElement);

        // Create a simple 3D object (cube)
        const geometry = new THREE.BoxGeometry();
        const textureLoader = new THREE.TextureLoader();
        const texture = textureLoader.load("{{ asset('assets/laravel.png') }}");
        const material = new THREE.MeshBasicMaterial({ map: texture });
        const cube = new THREE.Mesh(geometry, material);
        scene.add(cube);

        // Position the cube in the top-right corner
        const aspect = window.innerWidth / window.innerHeight;
        cube.position.set(5 / aspect, 2.5, 0);
        camera.position.set(0, 0, 5);
        camera.lookAt(cube.position);

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);

            cube.rotation.x += 0.01;
            cube.rotation.y += 0.01;

            renderer.render(scene, camera);
        }
        animate();

        // Handle window resize
        window.addEventListener('resize', () => {
            const aspect = window.innerWidth / window.innerHeight;
            camera.aspect = aspect;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
            cube.position.set(5 / aspect, 2.5, 0); // Update cube position on resize
        });
    </script>
</body>
</html>
