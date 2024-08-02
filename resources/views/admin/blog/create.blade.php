@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/create blog') }}">

<div class="page-content">

    <!-- main div here page -->

    <div class="container-fluid mt-5 bg-light ">
        <div class="row">
            <div class="col-md-10">
                <div class="table-container create-blog">
                    <table id="projectTable" class="table table-bordered">
                        <thead id="thead-dark">
                            <tr>
                                <th class="keyword-column" style="border: none; position: relative;">
                                    <div class="dropdown">
                                        <span id="keyRplc">Select Keyword</span>
                                    </div>
                                </th>
                                <th class="category-column" style="border: none; position: relative;">
                                    <select id="categorySelect" name="category">
                                        <option value="Select Category">Select Category</option>
                                        @if($category)
                                        @foreach($category as $category)
                                        <option value="{{ $category->categoryName}}">{{ $category->categoryName}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </th>
                                <th class="domain-column" style="border: none;">Domain Name</th>
                                <th class="prompt-column" style="border: none; position: relative;">
                                    <select id="PromptSelect" name="prompt">
                                        <option value="">Prompt Select</option>

                                    </select>
                                </th>
                                <th class="date-column" style="border: none;">
                                    <input type="text" id="dateSelect" placeholder="Date" readonly style="width: 100%; background-color: #9896f1; border: none; color: white; font-weight: bold;">
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!--  row -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td id="domainList"></td>
                                <td id="promptLis"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2">

                <form method="POST" action="{{ URL('blog/blogcreate') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Keyword Research Section -->
                    <div class="table-container keyword-research">
                        <table id="keywordResearchTable" class="table table-striped table-bordered">
                            <thead id="thead-dark">
                                <tr>
                                    <th style="border: none; padding: 13px;">Keyword List</th>
                                </tr>
                            </thead>
                        </table>
                        <!-- <div style="padding-top: 10px;">
                            <input type="text" id="keywordSearchInput" placeholder="Search keywords...">
                        </div> -->

                        <ul id="keywordList" style="padding-top: 10px;">
                            @if(!isset($keywordlists))
                            @foreach($keywordlist as $key => $keyword)
                            <li id="{{$keyword}}"><label><input type="radio" name="keyword" value="{{$keyword}}"> {{$keyword}}</label>
                                <input type="hidden" name="title" value="{{ $titlelist[$key] }}" id="titles_{{str_replace(' ','_',$keyword)}}" />
                            </li>
                            @endforeach
                            @else
                            @foreach($keywordlists as $key => $keyword)
                            <li id=" {{$keyword->keywordName}}"><label><input type="radio" name="keyword" value="{{$keyword->keywordName}}"> {{$keyword->keywordName}}</label>
                                <input type="hidden" name="title" value="{{ $titlelist[$key] }}" id="titles_{{str_replace(' ','_',$keyword->keywordName)}}" />
                            </li>
                            @endforeach
                            @endif

                        </ul>
                        <input type="hidden" name="kewordShow" id="kewordShow" value="" />
                        <input type="hidden" name="datePick" id="datePick" value="" />
                        <input type="hidden" name="keywordTitle" id="keywordTitle" value="" />
                        <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                            <!-- <button onclick="createTable()" disabled id="createBtn" class="btn btn-success">Create</button> -->
                            <input onclick="createTable()" type="submit" name="submit" id="createBtn" class="btn btn-success" disabled value="Create" />
                            <button onclick="cancelCreation()" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End Page-content -->


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
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">


<script>
    $(function() {
        $("#categorySelect").change(function() {
            var catVal = $('option:selected', this).text();

            $.ajax({
                url: 'getDomainData',
                type: 'GET',
                data: {
                    categoryVal: catVal
                },
                success: function(response) {
                    arrDomain = [];
                    arrPrompt = [];
                    var mySelect = $('#PromptSelect');
                    mySelect.html('<option>Prompt Select</option>');
                    if (response.length > 0) {
                        $.each(response, function(index) {
                            arrDomain[index] = response[index].projectName;
                            arrPrompt[index] = response[index].prompt + ' - ' + response[index].language + ' - ' + response[index].act_as;
                            mySelect.append(
                                $('<option></option>').val(response[index].act_as).html(response[index].prompt + ' - ' + response[index].language + ' - ' + response[index].act_as)
                            );
                        });
                        arryToStr = arrDomain.join(', ');
                        arryToStrprompt = arrPrompt.join(', ');
                        $('#domainList').html(arryToStr.split(",").join("<br/>"));
                        $('#promptLis').html(arryToStrprompt.split(",").join("<br/>"));
                    } else {
                        $('#domainList').html('');
                        alert("No Domain found");
                    }
                }
            });
        });
    });
    $(document).ready(function() {
        $('input[name="keyword"]').on("click", function() {
            var keyName = $('input[name = "keyword"]:checked').val();
            idText = keyName.replace(/ /g, '_');
            titleName = $('#titles_' + idText).val();
            $("#kewordShow").val(keyName);
            $("#keywordTitle").val(titleName);
            $("#keyRplc").html(keyName);
            $("#createBtn").attr('disabled', false);
        });
    });

    $(document).ready(function() {
        $("#dateSelect").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: 0,
            onSelect: function(dateText) {
                $("#dateSelect").data("selected-date", dateText);
                $("#datePick").val(dateText);
            }
        });

        // Add search functionality
        $('#keywordSearchInput').on('input', function() {
            let searchValue = $(this).val().toLowerCase();
            $('#keywordList li').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchValue) > -1)
            });
        });
    });

    function createTable() {
        // Get the selected keyword
        let selectedKeyword = document.querySelector('input[name="keyword"]:checked');
        if (!selectedKeyword) {
            alert('Please select a keyword.');
            return;
        }

        // Get the value of the selected keyword
        let keywordValue = selectedKeyword.value;

        // Get the selected category
        let selectedCategory = document.getElementById('categorySelect').value;
        if (selectedCategory === "Select Category") {
            alert('Please select a category.');
            return;
        }

        // Get the selected prompt
        let selectedPrompt = document.getElementById('PromptSelect').value;
        if (selectedPrompt === "Category 1") {
            alert('Please select a prompt.');
            return;
        }

        // Get the selected date
        let selectedDate = $("#dateSelect").data("selected-date");
        if (!selectedDate) {
            alert('Please select a date.');
            return;
        }

        // Create a table row with the selected data
        let newRow = `
                <tr>
                    <td>${keywordValue}</td>
                    <td>${selectedCategory}</td>
                    <td>www.example.com</td>
                    <td>${selectedPrompt}</td>
                    <td>${selectedDate}</td>
                </tr>
            `;

        // Append the new row to the table body
        let tableBody = document.getElementById('tableBody');
        tableBody.innerHTML += newRow;

        // Optional: Clear the selected keyword and date
        selectedKeyword.checked = false;
        document.getElementById('categorySelect').value = 'Select Category';
        document.getElementById('PromptSelect').value = 'Category 1';
        document.getElementById('dateSelect').value = '';
        $("#dateSelect").removeData("selected-date");
    }

    function cancelCreation() {
        // Clear selected keyword and date
        let selectedKeyword = document.querySelector('input[name="keyword"]:checked');
        if (selectedKeyword) {
            selectedKeyword.checked = false;
        }
        document.getElementById('categorySelect').value = 'Select Category';
        document.getElementById('PromptSelect').value = 'Category 1';
        document.getElementById('dateSelect').value = '';
        $("#dateSelect").removeData("selected-date");
    }
</script>