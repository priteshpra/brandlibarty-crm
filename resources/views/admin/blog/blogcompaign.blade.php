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
        <table class="table" id="tableID">
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
                <tr class="removeTr_<?php echo $value->id ?>" data-id="<?php echo $value->id ?>">
                    <td>
                        <?php echo $value->blog_name ?>
                    </td>
                    <td>
                        <?php echo $value->keywordName ?>
                    </td>
                    <td class="text-center">
                        <div class="pritudes">
                            <div class="tl-spinner-dot pritude">
                                <i class="fas fa-check" style="color: green; font-size: 20px;display:none"></i>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="pritudes">
                            <div class="tl-spinner-dot pritude"><i class="fas fa-check"
                                    style="color: green; font-size: 20px;display:none"></i></div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="pritudes">
                            <div class="tl-spinner-dot pritude"><i class="fas fa-check"
                                    style="color: green; font-size: 20px;display:none"></i></div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="pritudes">
                            <div class="tl-spinner-dot pritude"><i class="fas fa-check"
                                    style="color: green; font-size: 20px;display:none"></i></div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="pritudes">
                            <div class="tl-spinner-dot pritude"><i class="fas fa-check"
                                    style="color: green; font-size: 20px;display:none"></i></div>
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
                                <button type="submit" class="btn btn-sm btn-danger delete-btn"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr class="expandable-row" id="show_<?php echo $value->id ?>" data-id="<?php echo $value->id ?>"
                    style="display: none;">
                    <td colspan="8 " data-id="<?php echo $value->id ?>">
                        <div style="width:100%;">
                            <div
                                class="self-stretch rounded-t-none rounded-b-lg bg-neutral-n10 overflow-hidden flex flex-row items-start justify-start row-gap-20px max-w-full text-base mq1050:flex-wrap">
                                <div
                                    class="flex-1 bg-neutral-n0 flex flex-col items-start justify-start pt-6 px-6 pb-35px box-border gap-24px max-w-full lg:pt-5 lg:pb-5 lg:box-border mq750:min-w-full">
                                    <div
                                        class="self-stretch flex flex-col items-start justify-start gap-8px max-w-full">
                                        <div class="text-3xl">
                                            <h6>
                                                <?php echo $value->blog_name ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div
                                        class="self-stretch flex flex-col items-start justify-start gap-12px max-w-full">
                                        <div
                                            class="self-stretch flex flex-col items-start justify-start gap-8px max-w-full">
                                            <div
                                                class="self-stretch flex flex-row items-center justify-center max-w-full text-sm text-neutral-n400">
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
                        </div>

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
    <img src="//s.svgbox.net/loaders.svg?fill=maroon&ic=tail-spin" style="width:115px">
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
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
{{-- <script>
    $(document).ready(function() {
        function delay(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }
        async function processTable() {
            $('#tableID tbody tr').each(async function() {
                var trRowID = $(this).attr('data-id');
                $(this).find('td').each(async function() {
                    var cellData = $(this).html();
                    var rowID = $(this).attr('data-id');
                    var h2FindText = $(this).find('h2').text();
                    if (h2FindText) {
                        $(this).find('h2').each(async function(h2Index) {
                            var h2Text = $(this).text(); // Get the text of each h2
                            getImagesH2tag(h2Text, rowID);
                        });
                    }
                });
                var lastHtml = $("#show_" + trRowID).html();
                $.ajax({
                    url: 'getBlogDisabled',
                    type: 'POST',
                    async: false,
                    data: {
                        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        status: '0',
                        ID: trRowID,
                        updateData: lastHtml
                    },
                    success: function(response) {
                        if (response == 1) {
                            setTimeout(() => {
                                $('.removeTr_' + trRowID).remove();
                            }, 15000);
                        }
                    }
                });
            });
        }
        processTable();
    });

    function getImagesH2tag(h2TagText, rowID) {
        $.ajax({
            url: 'generate-image',
            type: 'POST',
            async: false,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            data: JSON.stringify({
                text: h2TagText
            }),
            success: function(data) {
                const image = document.createElement('img');
                image.style.width = "300px";
                image.style.height = "250px";
                image.style.paddingTop = "30px";
                console.log(data[0]);
                $('#load').hide();
                image.src = 'data:image/jpeg;base64,' + data[0]['base64']; // Assuming the API returns an image URL
                document.getElementById('result_' + h2TagText).appendChild(image);
            }
        });
        setTimeout(() => {
            snipperDone();
        }, 5000);
    }
</script> --}}
<script>
    $(document).ready(function () {
        function delay(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function processRow(row) {
            const trRowID = $(row).attr('data-id');
            // Process each cell in the row
            for (const cell of $(row).find('td')) {
                const h2Elements = $(cell).find('h2');
                for (const h2 of h2Elements) {
                    const h2Text = $(h2).text();
                    if (h2Text) {
                        await getImagesH2tag(h2Text, $(cell).attr('data-id'));
                    }
                }
            }

            const lastHtml = $("#show_" + trRowID).html();

            // Make AJAX call for each row
            try {
                const response = await $.ajax({
                    url: 'getBlogDisabled',
                    type: 'POST',
                    data: {
                        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        status: '0',
                        ID: trRowID,
                        updateData: lastHtml
                    }
                });

                if (response == 1) {
                    setTimeout(() => {
                        $('.removeTr_' + trRowID).remove();
                    }, 15000);
                }
            } catch (error) {
                console.error("Error processing row:", trRowID, error);
            }
        }

        async function processTable() {
            const rows = $('#tableID tbody tr').toArray();
            for (const row of rows) {
                await processRow(row);
                await delay(100); // Small delay between processing rows to avoid blocking
            }
        }

        async function getImagesH2tag(h2TagText, rowID) {
            try {
                const data = await $.ajax({
                    url: 'generate-image',
                    type: 'POST',
                    contentType: 'application/json',
                    headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    data: JSON.stringify({
                        text: h2TagText
                    })
                });

                const image = document.createElement('img');
                image.style.width = "300px";
                image.style.height = "250px";
                image.style.paddingTop = "30px";
                image.src = 'data:image/jpeg;base64,' + data[0]['base64'];
                document.getElementById('result_' + h2TagText).appendChild(image);
            } catch (error) {
                console.error("Error fetching image for:", h2TagText, error);
            } finally {
                // Simulate a small processing delay
                await delay(5000);
            }
        }
        processTable();
    });
</script>
@endsection
<script>
    function snipperDone() {
        setTimeout(() => {
            count = $('.table tr').find('.pritudes').length;
            $('.table tr').each(function() {
                $(this).find('td').each(function() {
                    setTimeout(() => {
                        $(this).find('.pritudes').find('div').first().removeClass('tl-spinner-dot').children().css('display', 'block');
                    }, 4000);
                });
            });
        }, 3000);
    }

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