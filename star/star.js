function starRating(element, option, clickCallback, moveCallback) {
    if (option === undefined || option.hasOwnProperty('readyOnly')) {
        option = {
            readOnly: false,
            width: 146,
            starCount: 5,
        };
    }
    $(element).each(function () {
        let _this = $(this);
        let defaultRatingValue = 0;
        let selectedRatingValue = 0;
        let dataCount = _this.data('count');
        console.log(dataCount);

        if (dataCount === undefined || dataCount === null || dataCount === '') {
            defaultRatingValue = (parseFloat(0) * 100) / option.starCount;
            selectedRatingValue = defaultRatingValue;
        } else {
            defaultRatingValue =
                (parseFloat(dataCount) * 100) / option.starCount;
            selectedRatingValue = defaultRatingValue;
        }

        function changedPosition($this, position) {
            $this.find('.percent').css('width', position + '%');
        }

        // Default rating value
        changedPosition(_this, defaultRatingValue);

        if (option.readOnly === false) {
            _this.on('mousemove', function (e) {
                let cX = getPosition(e);
                if (cX < 100) {
                    changedPosition(_this, cX);

                    if (moveCallback && typeof moveCallback !== undefined) {
                        moveCallback(
                            _this,
                            round((cX / 100) * option.starCount)
                        );
                    }
                }
            });

            _this.on('mouseleave', function (e) {
                changedPosition(_this, defaultRatingValue);

                if (moveCallback && typeof moveCallback !== undefined) {
                    moveCallback(
                        _this,
                        round((defaultRatingValue / 100) * option.starCount)
                    );
                }
            });

            _this.on('click', function (e) {
                selectedRatingValue = getPosition(e);
                defaultRatingValue = selectedRatingValue;
                changedPosition(_this, selectedRatingValue);

                if (clickCallback && typeof clickCallback !== undefined) {
                    clickCallback(
                        _this,
                        round((selectedRatingValue / 100) * option.starCount)
                    );
                }
            });
        }
    });

    function round(v) {
        return Math.round(v * 100) / 100;
    }

    function getPosition(e) {
        return (e.originalEvent.layerX / option.width) * 100;
    }
}

starRating(
    '.star-rating',
    {
        readOnly: false,
        width: 146,
        starCount: 5,
    },
    function clickRating(e, rateCount) {
        $(e).parent().find('.rating-number').text(rateCount);
    },
    function leaveRating(e, rateCount) {
        $(e).parent().find('.rating-number').text(rateCount);
    }
);
