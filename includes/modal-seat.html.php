<div class="modal-container">
    <div class="overlay modal-trigger"></div>
    <div class="modal">
        <div class="header-modal">
            <button aria-label="close modal" class="close-modal modal-trigger">
                <img src="../assets/images/closeblack.png" alt="Icone de fermeture de la fenêtre modale">
            </button>
        </div>
        <?php if(true): ?>
            <div class="container-offer">
                <?php for($i=0; $i<10; $i++): ?>
                    <div class="offer">
                        <div class="offer-image-container">
                            <img src="../assets/images/user.png">
                            <span>Charles</span>
                        </div>
                        <div class="offer-travel-container">
                            <span class="location-offer">11 septembre 2001</span>
                            <div class="travel-draw">
                                <div class="container-date">
                                    <p>
                                        <span class="date-offer">Metz</span>
                                        <span class="time-offer">13:30</span>
                                    </p>
                                    <div class="container-marker">
                                        <div class="round"></div>
                                        <div class="join"></div>
                                        <img class="marker" src="../assets/images/marker.png" alt="">
                                    </div>
                                    <p>
                                        <span class="date-offer">Paris</span>
                                        <span class="time-offer">17:00</span>
                                    </p>
                                </div>
                                <div class="container-marker">
                                    <div class="round"></div>
                                    <div class="join"></div>
                                    <img class="marker" src="../assets/images/marker.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="other-container">
                            <ul>
                                <li>
                                    <span class="number-place">Places: <span>4</span></span>
                                </li>
                            </ul>
                            <a class="book" href="">Réserver</a>
                        </div>
                </div>
                <?php endfor; ?> 
            </div>
        <?php else: ?>
            <div class="container-offer" style="height: 100%;">
                <h2 class="no-offer">Il n'y a aucune offres disponibles... 😞</h2>
            </div>
        <?php endif; ?> 
    </div>
</div>