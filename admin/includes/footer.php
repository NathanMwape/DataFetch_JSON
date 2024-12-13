
<style>
  /* Style du footer */
footer {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
    font-size: 0.9rem;
    margin-top: 40px;
}

.footer-container {
    max-width: 1000px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.footer-links {
    margin-top: 15px;
}

.footer-links a {
    color: #fff;
    text-decoration: none;
    margin: 0 15px;
    font-size: 0.9rem;
}

.footer-links a:hover {
    color: #28a745;
    text-decoration: underline;
}

/* Mobile responsiveness */
@media (max-width: 600px) {
    .footer-links {
        margin-top: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .footer-links a {
        margin: 5px 0;
    }
}

</style>
<footer>
    <div class="footer-container">
        <p>&copy; 2023 - Tous droits réservés</p>
        <div class="footer-links">
            <a href="privacy.php">Politique de confidentialité</a>
            <a href="terms.php">Conditions d'utilisation</a>
            <a href="contact.php">Contact</a>
        </div>
    </div>
</footer>
