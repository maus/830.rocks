<ol class='c-agenda'>
    <?php
    foreach( $agenda as $agendaItem ) : 
        extract( $agendaItem );
        $timestamp = strtotime( "2024-08-30 $time GMT+0300" );
        $dateTime = DateTime::createFromFormat( 'U', $timestamp );
        $timezone = new DateTimeZone( 'Europe/Bucharest' );
        $dateTime->setTimezone( $timezone );
        ?>
        <li class='c-agenda__item'>
            <div class='c-agenda__item__wrapper'>
                <time class='c-agenda__item__time' datetime='<?= $dateTime->format( 'c' ) ?>'><?= $dateTime->format( 'H:i' ) ?></time>
                <strong class='c-agenda__item__title'><?= $title ?></strong>
                <div class='c-agenda__item__description'>
                    <p><?= nl2br( $description ) ?></p>
                </div>
            </div>
        </li>
        <?php
    endforeach;
    ?>
</ol>