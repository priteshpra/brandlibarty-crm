@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/admin/css/BlogWritingPage.css') }}">
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
                            <td><?php echo $value->keywordName ?></td>
                            <td><?php echo $value->blog_name ?></td>
                            <td class="text-center">
                                <div class="tl-spinner-dot"></div>
                            </td>
                            <td class="text-center">
                                <div class="tl-spinner-dot"></div>
                            </td>
                            <td class="text-center">
                                <div class="tl-spinner-dot"></div>
                            </td>
                            <td class="text-center">
                                <div class="tl-spinner-dot"></div>
                            </td>
                            <td class="text-center">
                                <div class="tl-spinner-dot"></div>
                            </td>
                            <td>
                                <div class="button-container">
                                    <button class="edit-btn" data-key="${record.key}">
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
                        <tr class="expandable-row" id="show_1" style="display: none;">
                            <td colspan="8 ">
                                <div style=width:65%>
                                    <div class="self-stretch rounded-t-none rounded-b-lg bg-neutral-n10 overflow-hidden flex flex-row items-start justify-start row-gap-20px max-w-full text-base mq1050:flex-wrap">
                                        <div class="flex-1 bg-neutral-n0 flex flex-col items-start justify-start pt-6 px-6 pb-35px box-border gap-24px max-w-full lg:pt-5 lg:pb-5 lg:box-border mq750:min-w-full">
                                            <div class="self-stretch flex flex-col items-start justify-start gap-8px max-w-full">
                                                <div class="text-3xl">
                                                    The Future of AI in Marketing:
                                                    <p>Revolutionizing Targeted Campaigns with Data-Driven Strategies</p>
                                                </div>
                                            </div>
                                            <div class="self-stretch flex flex-col items-start justify-start gap-12px max-w-full">
                                                <div class="self-stretch flex flex-col items-start justify-start gap-8px max-w-full">
                                                    <div class="self-stretch flex flex-row items-center justify-center max-w-full text-sm text-neutral-n400">
                                                        <div class="flex-1 relative leading-20px inline-block max-w-full">
                                                            Explore the transformative role of AI in marketing and how
                                                            data-driven strategies are reshaping targeted campaigns.
                                                            Learn how AI technology is revolutionizing the way
                                                            businesses reach their audience and drive marketing
                                                            success.
                                                        </div>
                                                    </div>
                                                    <div class="mt-2 mb-2">
                                                        <div class=" ">
                                                            <img class="" loading="lazy" alt="" src="{{ asset('assets/admin/images/feactured.jpg') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="mb-4">
                                                        Artificial Intelligence (AI) is revolutionizing the marketing landscape, empowering businesses to create more personalized and targeted campaigns than ever before. By harnessing the power of AI and leveraging data-driven strategies, marketers can unlock new opportunities to connect with their audience and drive impactful results. Let’s delve into the future of AI in marketing and the transformative impact it is having on targeted campaigns.
                                                    </div>
                                                    <!-- Apply padding using Tailwind utility class -->
                                                    <div class="text-xl font-semibold mb-4">Table of Contents</div> <!-- Apply text and font styles -->
                                                    <div class="p-2"> <!-- Apply border, rounded corners, and shadow -->
                                                        <ol class="list-decimal ml-8"> <!-- Use Tailwind class list-decimal for decimal numbering -->
                                                            <li class="mb-2">The Future of AI in Marketing</li> <!-- Apply margin bottom -->
                                                            <li class="mb-2">The Evolution of AI in Marketing</li>
                                                            <li class="mb-2">Leveraging Data for Targeted Campaigns</li>
                                                            <li class="mb-2">Personalization at Scale</li>
                                                            <li class="mb-2">Enhancing Customer Engagement with AI</li>
                                                            <li class="mb-2">Predictive Analytics for Marketing Success</li>
                                                            <li class="mb-2">Automation and Efficiency in Marketing</li>
                                                            <li class="mb-2">Embracing AI for Marketing Innovation</li>
                                                        </ol>
                                                    </div>
                                                </div>
                                                <div class="self-stretch flex flex-col items-start justify-start gap-24px max-w-full">
                                                    <div class="self-stretch flex flex-col items-start justify-start gap-24px max-w-full">
                                                        <div class="self-stretch flex flex-col items-start justify-start gap-24px max-w-full">
                                                            <div class="self-stretch flex flex-row items-center justify-between gap-24px max-w-full text-sm mq750:flex-wrap">
                                                                <div class="h-218px w-280px gap-10px flex flex-col items-center justify-start min-w-380px mq750:flex-1">
                                                                    <img class="  loading=" lazy" alt="" src="{{ asset('assets/admin/images/robot3.jpg') }}" />
                                                                </div>
                                                                <div class="h-250px flex-1 relative tracking--0.02px leading-20px flex items-center min-w-250px max-w-full">
                                                                    <span>

                                                                        <div class="text-3xl mb-4">
                                                                            The Evolution of AI in Marketing
                                                                        </div>
                                                                        <span>
                                                                            <span class="">AI has emerged as a game-changer in marketing, enabling businesses to analyze vast amounts of data, predict consumer behavior, and deliver personalized experiences at scale. From recommendation engines to predictive analytics, AI technology is reshaping how marketers engage with their target audience.</span>
                                                                            <a class="text-accent-a300" href="https://www.google.com" target="_blank">
                                                                                <span>AI technology </span>
                                                                            </a>
                                                                            <span>
                                                                                is reshaping how marketers engage with their
                                                                                target audience.
                                                                            </span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="self-stretch flex flex-col items-start justify-start gap-24px max-w-full">
                                                            <div class="text-3xl mb-1">
                                                                Leveraging Data for Targeted Campaigns
                                                            </div>
                                                            <div class="self-stretch flex flex-row items-center justify-between gap-24px max-w-full text-sm mq750:flex-wrap">
                                                                <div class="h-250px flex-1 relative tracking--0.02px leading-20px flex items-center min-w-250px max-w-full">
                                                                    <span>
                                                                        <span>Data lies at the heart of AI-driven marketing strategies, providing valuable insights into consumer preferences, behavior patterns, and purchase intent. By leveraging data analytics and machine learning algorithms, marketers can create hyper-targeted campaigns that resonate with their audience and drive conversion rates.</span>
                                                                        <span> </span>
                                                                        <a class="text-accent-a300" href="https://www.google.com" target="_blank">
                                                                            <span>AI technology </span>
                                                                        </a>
                                                                        <span>
                                                                            is reshaping how marketers engage with their target audience.
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="h-218px w-280px gap-10px flex flex-col items-center justify-start min-w-380px mq750:flex-1">
                                                                    <img class="self-stretch flex-1 relative max-w-full overflow-hidden max-h-full object-cover mq750:self-stretch mq750:w-auto" loading="lazy" alt="" src="{{ asset('assets/admin/images/New1.jpg') }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ai-marketing-section">
                                                    <h2 class="text-3xl mb-4">Personalization at Scale</h2>
                                                    <p class="mb-4">AI enables marketers to deliver personalized content and recommendations to individual consumers based on their browsing history, past interactions, and demographic information. By tailoring messaging and offers to specific segments, businesses can enhance customer engagement and loyalty.</p>
                                                    <div class="flex justify-center">
                                                        <img class="h-40% w-40%" src="{{ asset('assets/admin/images/Automation.jpg') }}" alt="Automation Image" />
                                                    </div>
                                                </div>
                                                <div class="items-center justify-center">
                                                    <h2 class="text-3xl mb-4">Enhancing Customer Engagement</h2>
                                                    <div class="flex flex-row items-center">
                                                        <div class="p-4 ">
                                                            <img style=width:60%; src="{{ asset('assets/admin/images/Customer.jpg') }}" alt="Customer Image" />
                                                        </div>
                                                        <div class="w-1/2">
                                                            <p class="mb-4">AI-powered marketing tools such as chatbots, virtual assistants, and personalized emails enable businesses to engage with customers in real time, providing instant support and personalized recommendations. By leveraging AI for customer interactions, companies can build stronger relationships and drive brand loyalty.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <div class="content">
                                                        <h2>AI in Marketing</h2>
                                                        <p>
                                                            AI algorithms can analyze historical data, identify trends, and predict future outcomes, allowing marketers to make data-driven decisions and optimize their campaigns for maximum impact. Predictive analytics help businesses anticipate customer needs and preferences, leading to more effective marketing strategies.
                                                        </p>
                                                    </div>
                                                    <div class="image">
                                                        <img src="{{ asset('assets/admin/images/work.jpg') }}" alt="Customer Image" />
                                                    </div>
                                                </div>
                                                <div class="self-stretch flex flex-col items-start justify-start gap-8px">
                                                    <div class="self-stretch h-13px relative leading-24px font-semibold flex items-center shrink-0">
                                                        Social Media
                                                    </div>
                                                    <div class="self-stretch flex flex-row items-start justify-start py-0 pr-490px pl-0 gap-20px mq750:flex-wrap mq750:pr-245px mq750:box-border mq450:pr-5 mq450:box-border">
                                                        <div class="overflow-hidden flex flex-row items-center justify-center p-1">
                                                            <RiFacebookFill class="h-6 w-6 text-gray-400 relative overflow-hidden shrink-0" />
                                                        </div>
                                                        <div class="overflow-hidden flex flex-row items-center justify-center p-1">
                                                            <FaTwitter class="h-6 w-6 text-gray-400 relative overflow-hidden shrink-0" />
                                                        </div>
                                                        <div class="overflow-hidden flex flex-row items-center justify-center p-1">
                                                            <FaLinkedin class="h-6 w-6 text-gray-400 relative overflow-hidden shrink-0" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="self-stretch flex flex-col items-start justify-start gap-8px max-w-full">
                                                    <div class="relative leading-24px font-semibold inline-block min-w-126px">
                                                        Contact details
                                                    </div>
                                                    <div class="self-stretch flex flex-row items-start justify-start gap-24px max-w-full text-accent-a300 mq750:flex-wrap">
                                                        <img class="h-24 w-24 relative object-cover min-h-96px" loading="lazy" alt="" src="{{ asset('assets/admin/images/image 17.png') }}">
                                                        <div class="flex-1 flex flex-col items-start justify-start pt-0 px-0 pb-1 box-border gap-8px min-w-334px max-w-full">
                                                            <div class="self-stretch relative leading-24px font-semibold">
                                                                Rahul Jadhav
                                                            </div>
                                                            <div class="self-stretch relative text-sm leading-20px text-neutral-n400">
                                                                http://rahuljadhav.in
                                                            </div>
                                                            <div class="self-stretch flex flex-row items-start justify-start py-0 pr-370px pl-0 gap-20px mq750:flex-wrap mq750:pr-185px mq750:box-border mq450:pr-5 mq450:box-border">
                                                                <div class="overflow-hidden flex flex-row items-center justify-center p-1">
                                                                    <RiFacebookFill class="h-6 w-6 relative text-gray-400 overflow-hidden shrink-0" />
                                                                </div>
                                                                <div class="overflow-hidden flex flex-row items-center justify-center p-1">
                                                                    <FaTwitter class="h-6 w-6 text-gray-400 relative overflow-hidden shrink-0" />
                                                                </div>
                                                                <div class="overflow-hidden flex flex-row items-center justify-center p-1">
                                                                    <FaLinkedin class="h-6 w-6 text-gray-400 relative overflow-hidden shrink-0" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Section-2 -->
                                            <div class="h-2232px w-452px relative min-w-452px max-w-full mq750:min-w-full mq1050:flex-1 mq450:h-auto mq450:min-h-2232">
                                                <div class="absolute top-0 left-0 box-border w-0.5 h-2234px border-r-2 border-solid border-neutral-n20"></div>
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
@endsection
<script>
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
                $('.expandable-row').toggle();
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