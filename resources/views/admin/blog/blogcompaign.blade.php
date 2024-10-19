@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/BlogWritingPage.css') }}">
<style>
    div#load {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 50%;
        left: 50%;
        height: 100%;
        width: 100%;
    }
</style>
<div class="page-content">

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Campaign Title</th>
                    <th>Target Keyword</th>
                    <th>Media</th>
                    <th>Affiliate</th>
                    <th>Snippet</th>
                    <th>Checking</th>
                    <th>Spinner</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php if ($blogList != '') {
                    foreach ($blogList as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->blog_name ?></td>
                            <td><?php echo $value->keywordName ?></td>
                            <td class="text-center">
                                <div class="">
                                    <div class="tl-spinner-dot pritude">
                                        <i class="fas fa-check" style="color: green; font-size: 20px;display:none"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="">
                                    <div class="tl-spinner-dot pritude"><i class="fas fa-check" style="color: green; font-size: 20px;display:none"></i></div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="pritudes">
                                    <div class="tl-spinner-dot pritude"><i class="fas fa-check" style="color: green; font-size: 20px;display:none"></i></div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="pritudes">
                                    <div class="tl-spinner-dot pritude"><i class="fas fa-check" style="color: green; font-size: 20px;display:none"></i></div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="pritudes">
                                    <div class="tl-spinner-dot pritude"><i class="fas fa-check" style="color: green; font-size: 20px;display:none"></i></div>
                                </div>
                            </td>
                            <td>
                                <div class="button-container">
                                    <button class="edit-btn" data-key="${record.key}" data-id="<?php echo $value->id ?>">
                                        <i class="fas fa-edit" style="color: blue; font-size: 25px;"></i>
                                    </button>

                                    <form action="{{ route('blog.destroy', $value->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr class="expandable-row" id="show_<?php echo $value->id ?>" data-id="<?php echo $value->id ?>" style="display: none;">
                            <td colspan="8 ">
                                <div style="width:100%;">
                                    <div class="self-stretch rounded-t-none rounded-b-lg bg-neutral-n10 overflow-hidden flex flex-row items-start justify-start row-gap-20px max-w-full text-base mq1050:flex-wrap">
                                        <div class="flex-1 bg-neutral-n0 flex flex-col items-start justify-start pt-6 px-6 pb-35px box-border gap-24px max-w-full lg:pt-5 lg:pb-5 lg:box-border mq750:min-w-full">
                                            <div class="self-stretch flex flex-col items-start justify-start gap-8px max-w-full">
                                                <div class="text-3xl">
                                                    <h6><?php echo $value->blog_name ?></h6>
                                                </div>
                                            </div>
                                            <div class="self-stretch flex flex-col items-start justify-start gap-12px max-w-full">
                                                <div class="self-stretch flex flex-col items-start justify-start gap-8px max-w-full">
                                                    <div class="self-stretch flex flex-row items-center justify-center max-w-full text-sm text-neutral-n400">
                                                        <div class="flex-1 relative leading-20px inline-block max-w-full">

                                                            <?php //$desc = preg_replace('/\#\#(.+)\#\#/sU', '<b>$1</b>', $value->content); 
                                                            $formating = array("###", "##", '"< >"');
                                                            $html = array("<b>", "<b>", "<br/>");
                                                            $desc = str_replace($formating, $html, $value->content);
                                                            $desc = strip_tags($desc, ['p', 'b', 'i', 'br']);
                                                            ?>
                                                            {!! $value->content !!}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <input class="add-button-container add-button" style="float: right;background-color: #9896f1;color: white;" type="button" id="Send" name="Send" value="Send">
                                </div>
                                <!-- <div style="width:30%;float: right;position: relative;">
                                    <div id="result_<?php echo $value->id ?>" data-id="<?php echo $value->id ?>"></div>
                                </div> -->

                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td>No records</td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End Page-content -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="load" style="display:none">
    <img src="//s.svgbox.net/loaders.svg?fill=maroon&ic=tail-spin"
        style="width:115px">
</div>
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script>
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">

                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->
<script
    src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
    crossorigin="anonymous"></script>
<script>
    $(".add-button-container").click(function(e) {
        e.preventDefault();
        htmlData = $(".expandable-row").html();
        dataId = window.ColId;
        $.ajax({
            url: 'getBlogDisabled',
            type: 'POST',
            data: {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                status: '0',
                htmlData: htmlData,
                ID: dataId
            },
            success: function(response) {
                if (response != 0) {
                    location.reload();
                }
            }
        });
    });
    $(".imageGet").click(function(e) {
        e.preventDefault();
        $('#load').show();
        const text = $(this).html();
        const idre = text; //$(this).parents('.expandable-row').attr('data-id');
        fetch('generate-image', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    text
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('result_' + idre).innerText = 'Error: ' + data.error;
                } else {
                    const image = document.createElement('img');
                    image.style.width = "300px";
                    image.style.height = "250px";
                    image.style.paddingTop = "30px";
                    console.log(data[0]);
                    $('#load').hide();
                    image.src = 'data:image/jpeg;base64,' + data[0]['base64']; // Assuming the API returns an image URL
                    document.getElementById('result_' + idre).appendChild(image);
                }
            })
            .catch(error => {
                $('#load').hide();
                document.getElementById('result_' + idre).innerText = 'Error: ' + error;
            });
    });
</script>
@endsection
<script>
    setTimeout(() => {
        // $(".pritude").removeClass('tl-spinner-dot').children().css('display', 'block');
        count = $('.table tr').find('.pritudes').length;
        // for (let index = 0; index < count; index++) {
        //     console.log(index);

        //     setTimeout(() => {
        //         var $firstPritude = $('.table tr').find('.pritudes').find('div').first();
        //         console.log($firstPritude);
        //         $firstPritude.removeClass('tl-spinner-dot').children().css('display', 'block');
        //     }, 2000);
        // }

        $('.table tr').each(function() {
            // Find the first `.pritude` element within the current row
            $(this).find('td').each(function() {
                // Find the specific elements and remove the class
                setTimeout(() => {
                    $(this).find('.pritudes').find('div').first().removeClass('tl-spinner-dot').children().css('display', 'block');
                }, 4000);
            });
        });


    }, 3000);

    document.addEventListener('DOMContentLoaded', () => {
        const tableData = [{
                key: '1',
                campaignTitle: 'The Future of AI in Marketing',
                targetKeyword: 'Artificial Intelligence in Marketing',
                media: '<div class="text-center"><div class="tl-spinner-dot"></div></div>',
                affiliate: '<div class="text-center"><div class="tl-spinner-dot"></div></div>',
                snippet: '<div class="text-center"><div class="tl-spinner-dot"></div></div>',
                checking: '<div class="text-center"><div class="tl-spinner-dot"></div></div>',
                spinner: '<div class="text-center"><div class="tl-spinner-dot"></div></div>',
                content: 'By Rahul Jadhav - May 2, 2024'
            },
            // Add more rows if needed
        ];

        const tableBody = document.getElementById('table-body');

        tableData.forEach(record => {
            const row = document.createElement('tr');

            $('.edit-btn').click(function() {
                var ColId = $(this).attr('data-id');
                window.ColId = ColId;
                $("#show_" + ColId).toggle();
            });
        });

        // Event listeners for edit and delete buttons
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                event.stopPropagation(); // Stop propagation to prevent row click handler
                const key = button.getAttribute('data-key');
                console.log(`Edit row with key ${key}`);
            });
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                event.stopPropagation(); // Stop propagation to prevent row click handler
                const key = button.getAttribute('data-key');
                console.log(`Delete row with key ${key}`);
            });
        });
    });
</script>