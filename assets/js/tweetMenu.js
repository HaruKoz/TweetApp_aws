(function () {
    const tweetMenu = document.querySelectorAll('.tweet-menu');
    tweetMenu.forEach(tm => {
        var modal = tm.querySelector('.tweet-menu-modal');

        tm.addEventListener('click', () => {
            modal.style.display = 'block';
            modal.animate(
                [
                    { transform: 'scale(0, 0)' },
                    { transform: 'scale(1, 1)' }
                ],
                {
                    duration: 80,
                    direction: 'alternate'
                }
            );
        }, true);

        modal.addEventListener('click', () => {              
            modal.style.display = 'none';
            var tweet_id = modal.dataset.tweet;
            showForm(tweet_id);
        }, false);

        addEventListener('click', (event) => {
            if (event.target != modal) {
                modal.style.display = 'none';
            }
        }, true);
    });

    function showForm(tweet_id) {
        var form = (
            `<form action="handle/handleDeleteTweet.php" method="post">
                <div id="modal-delete-tweet">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1>このツイートを削除しますか？</h1>
                        </div>
                        <div class="modal-body">
                            <p>この操作は取り消せません。</p>
                            <button class="delete-btn" type="submit">削除</button>
                            <button class="cancel-btn" type="button">キャンセル</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="tweet_id" value=${tweet_id}></input>
                <input type="hidden" name="delete" value="1"></input>
            </form>`
        );        
        deleteTweetElement().insertAdjacentHTML('beforeend', form);
        const cancelButton = deleteTweetElement().querySelector('.cancel-btn');
        cancelButton.addEventListener('click', closeForm, false);
    }

    function closeForm() {
        const dt = document.getElementById('delete-tweet');
        dt.firstChild.remove();
    }

    let deleteTweetElement = () => {
        return document.getElementById('delete-tweet');
    }
}());