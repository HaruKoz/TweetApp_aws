function moveSectionBorder(move) {

    var selectedElement = document.getElementById("selected-section");
    var parentElement = document.getElementById("section-list");
    var moveElement = document.getElementById("section-border");

    // 要素の位置座標を取得
    var selectedRect = selectedElement.getBoundingClientRect();
    var parentRect = parentElement.getBoundingClientRect();

    const s_left = selectedRect.left - parentRect.left + 'px';
    const s_width = selectedRect.width + 'px';

    if (move) {
        var unselectedElement = document.getElementById("unselected-section");
        var unselectedRect = unselectedElement.getBoundingClientRect();
        const u_left = unselectedRect.left - parentRect.left + 'px';
        const u_width = unselectedRect.width + 'px';

        moveElement.animate(
            {
                left: [u_left, s_left],
                width: [u_width, s_width]
            },
            240
        );
    }

    moveElement.style.left = s_left;
    moveElement.style.width = s_width;
    moveElement.style.bottom = selectedRect.bottom - parentRect.bottom + 1 + 'px';
}