var HolidayPackage = {
    init: function () {
        $('#btnAddHotel').click(function (e) {
            e.preventDefault();
            HolidayPackage.addHotel();
        });
        $('html').on('click', 'button.btnRemoveHotel', function (e) {
            e.preventDefault();
            var that = this;
            HolidayPackage.removeHotel(that)
        });

        $('html').on('click', 'button.btnAddPackage', function (e) {
            e.preventDefault();
            var that = this;
            HolidayPackage.addPackage(that)
        });

        $('html').on('click', 'button.btnRemovePackage', function (e) {
            e.preventDefault();
            var that = this;
            HolidayPackage.removePackage(that)
        });
    },
    addHotel: function () {
            var newHotelIndex = $('.holiday_package').length + 1;

            var hotelHtml = '<div class="holiday_package">\n' +
                '                                            <div class="row">\n' +
                '                                                <div class="col-md-12">\n' +
                '                                                    <label class="col-md-2 control-label pull-left">Hotel<span class="text-danger">*</span></label>\n' +
                '                                                    <div class="col-md-4">\n' +
                '                                                        <input class="form-control" type="text" name="hotel[]" required minlength="2" maxlength="255">\n' +
                '                                                    </div>\n' +
                 '                                                   <div class="col-md-6">\n' +
                '                                                        <button type="button" title="Remove Hotel" class="btn btn-danger btn-sm pull-right btnRemoveHotel"><i class="fa fa-trash-o"></i></button>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            <div class="row packages">\n' +
                '                                                <div class="col-md-12">\n' +
                '                                                    <div class="packages">\n' +
                '                                                        <table class="table table-bordered">\n' +
                '                                                            <thead>\n' +
                '                                                            <tr>\n' +
                '                                                                <th class="text-center bold">Package Type*</th>\n' +
                '                                                                <th class="text-center bold">Adult*</th>\n' +
                '                                                                <th class="text-center bold">Child</th>\n' +
                '                                                                <th class="text-center bold">Infant</th>\n' +
                '                                                                <th class="text-center bold">Bookable?</th>\n' +
                '                                                                <th class="text-center bold" width="5%">\n' +
                '                                                                    <button type="button" title="add package" class="btn btn-primary btn-sm btnAddPackage"><i class="fa fa-plus-circle"></i></button>\n' +
                '\n' +
                '                                                                </th>\n' +
                '                                                            </tr>\n' +
                '                                                            </thead>\n' +
                '                                                            <tbody data-index="'+newHotelIndex+'">\n' +
                '                                                            <tr>\n' +
                '                                                                <td>\n' +
                '                                                                    <input class="form-control" type="text" name="package_'+newHotelIndex+'[]" required>\n' +
                '                                                                </td>\n' +
                '                                                                <td>\n' +
                '                                                                    <input class="form-control" type="number" name="adult_'+newHotelIndex+'[]" required>\n' +
                '                                                                </td>\n' +
                '                                                                <td>\n' +
                '                                                                    <input class="form-control" type="number" name="child_'+newHotelIndex+'[]">\n' +
                '                                                                </td>\n' +
                '                                                                <td>\n' +
                '                                                                    <input class="form-control" type="number" name="infant_'+newHotelIndex+'[]">\n' +
                '                                                                </td>\n' +
                '                                                                <td class="bookable">\n' +
                '                                                                    <input checked type="checkbox" name="bookable_'+newHotelIndex+'[]">\n' +
                '                                                                </td>\n' +
                '                                                                <td></td>\n' +
                '                                                            </tr>\n' +
                '                                                            </tbody>\n' +
                '                                                        </table>\n' +
                '\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>';


            $('#hotel_and_packages').append(hotelHtml);
    },
    removeHotel: function(element){
        $(element).closest('div.holiday_package').remove();
    },
    addPackage: function (element) {
        var newPackageIndex =  $(element).closest('table').find('tbody').attr('data-index');
        var packageHtml = '<tr>\n' +
            '                                                                <td>\n' +
            '                                                                    <input class="form-control" type="text" name="package_'+newPackageIndex+'[]" required>\n' +
            '                                                                </td>\n' +
            '                                                                <td>\n' +
            '                                                                    <input class="form-control" type="number" name="adult_'+newPackageIndex+'[]" required>\n' +
            '                                                                </td>\n' +
            '                                                                <td>\n' +
            '                                                                    <input class="form-control" type="number" name="child_'+newPackageIndex+'[]">\n' +
            '                                                                </td>\n' +
            '                                                                <td>\n' +
            '                                                                    <input class="form-control" type="number" name="infant_'+newPackageIndex+'[]">\n' +
            '                                                                </td>\n' +
            '                                                                <td class="bookable">\n' +
            '                                                                    <input checked type="checkbox" name="bookable_'+newPackageIndex+'[]">\n' +
            '                                                                </td>\n' +
            '                                                                <td>' +
            '                                                            <button type="button" title="remove package" class="btn btn-danger btn-sm btnRemovePackage"><i class="fa fa-trash-o"></i></button>\n' +
            '                                                               </td>\n' +
            '                                                            </tr>';
        $(element).closest('table').find('tbody').append(packageHtml);
    },
    removePackage: function (element) {
        $(element).closest('tr').remove();
    },
    activeHotelAccordion: function () {
        jQuery(document).on('ready', function(){
            $('a.page-scroll').on('click', function(e){
                var anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(anchor.attr('href')).offset().top - 50
                }, 1500);
                e.preventDefault();
            });

        });
    }
};