<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Moderno Simples</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        header {
            background: #0078d7;
            padding: 20px;
        }

        header nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        header nav a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: 500;
            transition: color 0.3s;
        }

        header nav a:hover {
            color: #ffeb3b;
        }

        #home {
            text-align: center;
            padding: 80px 20px;
            background: linear-gradient(135deg, #0078d7, #00c6ff);
            color: white;
            clip-path: polygon(0 0, 100% 0, 100% 80%, 0 100%);
        }

        #home h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        #home button {
            background: #ff6f61;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1.2rem;
            border-radius: 25px;
            cursor: pointer;
            transition: transform 0.3s, background 0.3s;
        }

        #home button:hover {
            transform: translateY(-5px);
            background: #ff3e30;
        }

        section {
            padding: 60px 20px;
            text-align: center;
        }

        #products .products-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .product-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .product-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .product-card p {
            margin-bottom: 10px;
            font-size: 1rem;
            color: #555;
        }

        .product-card button {
            background: #0078d7;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .product-card button:hover {
            background: #005fa3;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 15px 20px;
            margin-top: 50px;
        }

        /* Estilo do botão WhatsApp fixo */
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 70px;
            height: 70px;
            background-color: #25d366;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .whatsapp-button:hover {
            transform: scale(1.1);
            background-color: #1da955;
        }

        .whatsapp-button img {
            width: 35px;
            height: 35px;
        }

        /* Media queries para telas pequenas */
        @media (max-width: 768px) {
            #home h1 {
                font-size: 2rem;
            }

            #home button {
                font-size: 1rem;
                padding: 10px 20px;
            }

            .product-card {
                padding: 15px;
            }

            .product-card h3 {
                font-size: 1.2rem;
            }

            footer {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            header nav ul {
                flex-direction: column;
                align-items: center;
            }

            header nav a {
                font-size: 16px;
            }

            #home h1 {
                font-size: 1.8rem;
            }

            #home button {
                font-size: 0.9rem;
                padding: 8px 16px;
            }

            .product-card h3 {
                font-size: 1rem;
            }
        }
        /* Estilo do botão Comprar */
.btn-comprar {
    display: inline-block;
    background-color: #0078d7;
    color: white;
    padding: 12px 25px;
    font-size: 1.1rem;
    font-weight: 600;
    text-align: center;
    border-radius: 25px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.3s;
    cursor: pointer;
}

.btn-comprar:hover {
    background-color: #005fa3;
    transform: translateY(-3px);
}

.btn-comprar:active {
    transform: translateY(1px);
}

.btn-comprar:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

    </style>
</head>
<body>


    <section id="home">
        <h1>Bem-vindo  </h1>
        <button>fragrâncias únicos e inesquecivel</button>
    </section>



    <section id="products">
      
        <div class="products-container">
            <?php
            include('db_connect.php'); // Certifique-se de que o arquivo db_connect.php está configurado corretamente.
            $sql = "SELECT * FROM produtos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product-card'>";
                    echo "<img src='" . htmlspecialchars($row['imagem']) . "' alt='" . htmlspecialchars($row['nome']) . "'>";
                    echo "<h3>" . htmlspecialchars($row['nome']) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['descricao']) . "</p>";
                    echo "<p>Kz " . htmlspecialchars($row['preco']) . "</p>";
                    // Botão de Comprar
                    echo "<button><a href='https://wa.me/244XXXXXXXXX?text=Gostaria%20de%20comprar%20o%20produto:%20" . urlencode($row['nome']) . "' target='_blank' class='btn-comprar'>Comprar</a></button>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
            $conn->close();
            ?>
        </div>
    </section>

    <!-- Botão WhatsApp fixo -->
    <a class="whatsapp-button" href="https://wa.me/244XXXXXXXXX?text=Olá!%20Gostaria%20de%20mais%20informações." target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>


</body>
</html>
