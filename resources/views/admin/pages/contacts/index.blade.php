@extends("admin")
@section("title", "Заявки с сайта")
@section("css")
@endsection

@section("content")
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield("title")</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список заявок</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th style="width: 2%">ID</th>
                                        <th style="width: 17%">Статус</th>
                                        <th style="width: 17%">Имя</th>
                                        <th style="width: 10%">Телефон</th>
                                        <th>Комментарий</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            @if($contact->status)
                                                <td>
                                                    <span class="right badge badge-success">Обработан</span>
                                                    <p class="contacts-date">Созданна : <b>{{ $contact->created_at->format('d-m-y H:i') }}</b></p>
                                                    <p class="contacts-date">Обработанна : <b>{{ $contact->updated_at->format('d-m-y H:i') }}</b></p>
                                                </td>
                                            @else
                                                <td>
                                                    <span id="contactStatus-{{ $contact->id }}" class="right badge badge-warning">Не обработан</span>
                                                    <button
                                                        type="submit"
                                                        data-contact-id="{{ $contact->id }}"
                                                        class="btn btn-success contactStatus"
                                                        form="contactFormCompletedStatus-{{ $contact->id }}"
                                                    >
                                                        Завершить
                                                    </button>
                                                    <p class="contacts-date">Созданна : <b>{{ $contact->created_at->format('d-m-y H:i') }}</b></p>
                                                    <p id="contactUpdateDate-{{ $contact->id }}" class="contacts-date" style="display: none"></p>
                                                    <form
                                                        id="contactFormCompletedStatus-{{ $contact->id }}"
                                                        method="post"
                                                        action="{{ route("admin.contacts.completed", ["contact" => $contact->id]) }}"
                                                    >
                                                        @csrf
                                                        @method("PATCH")
                                                    </form>
                                                </td>
                                            @endif
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->text }}</td>
                                        </tr>
                                        <?php $i++;?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section("scripts")
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const buttonStatusComplete = document.querySelectorAll(".contactStatus")
        buttonStatusComplete.forEach((button) => {
            if (button) {
                button.addEventListener("click", function (e) {
                    e.preventDefault()
                    const buttonId = e.target.dataset.contactId
                    const contactFormCompletedStatus = document.getElementById("contactFormCompletedStatus-" + buttonId)

                    axios({
                        method: 'PATCH',
                        url: "/amg-admin/contacts/" + buttonId,
                        //data: {status_gallary:statusaGallary, alt:inputAltGallery}

                    }) .then(function (res) {
                        if (res.data.success === "ok") {
                            console.log(res.data.date)
                            e.target.style.display = "none"
                            const contactUpdateDate = document.getElementById("contactUpdateDate-" + buttonId)
                            const contactStatus = document.getElementById("contactStatus-" + buttonId)
                            contactStatus.classList.remove("badge-warning")
                            contactStatus.classList.add("badge-success")
                            contactStatus.innerText = "Обработан"
                            contactUpdateDate.style.display = "block"
                            contactUpdateDate.innerHTML = "Обработанна : <b>" + res.data.date +"</b>"
                        }
                    })
                })
            }
        })

    </script>
@endsection



