@model WatchStore.Models.MOrder

@{
    ViewBag.Title = "Details";
    Layout = "~/Areas/Admin/Views/Shared/_LayoutAdmin.cshtml";
}
@Html.Partial("_MessageAlert")
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Chủ đề bài viết</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="~/admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a>Topic</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Detail</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-3">
        <br />
        <a class="btn btn-success " href="@Url.Action("Index","Order")"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;<span class="bold">Quay về</span></a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    @*<h5 style="color:red;">@Model.Name</h5>*@
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="table border">
                                <thead>
                                    <tr>
                                        <th>Địa chỉ nhận hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Họ tên KH: <b> @Model.DeliveryName</b></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại: <b> @Model.DeliveryPhone</b></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ: <b> @Model.DeliveryAddress</b></td>
                                    </tr>
                                    <tr>
                                        <td>Email: <b> @Model.DeliveryEmail</b></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7">
                            <table class="table border">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th class="text-center">SL</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
@{double ThanhTien = 0;
                                        foreach (var c in ViewBag.orderDetails)
                                        {
                                            ThanhTien += c.Amount;
                                            <tr>
                                                @foreach (var y in ViewBag.productOrder)
                                                {
                                                    if (y.ID == c.ProductId)
                                                    {
                                                        <td> <img src="~/Public/library/product/@y.Image" alt="<%= p.Image%>" width="70">@y.Name</td>
                                                    }
                                                }
                                                <td>    @String.Format("{0:0,0₫}", c.Price)</td>
                                                <td class="text-center">x    @c.Quantity</td>
                                                <td>    @String.Format("{0:0,0₫}", c.Amount) </td>
                                            </tr>
                                        } }

                                    <tr class="border-top">
                                        <td class="" colspan="3"> Thành tiền</td>
                                        <td>@String.Format("{0:0,0₫}", ThanhTien) </td>
                                    </tr>
                                    <tr>
                                        <td class="" colspan="3"> Phí vận chuyển</td>
                                        <td>@String.Format("{0:0₫}", 0) </td>
                                    </tr>
                                    <tr>
                                        <td class="" colspan="3"> Tổng cộng </td>
                                        <td>@String.Format("{0:0,0₫}", ThanhTien) </td>
                                    </tr>
                                    <tr>
                                        <td class="" colspan="3">
                                            @if (Model.Status == 1)
                                            {
                                                <a class="btn btn-success " href="~/admin/order/Upstatus/@Model.Id"><i class="fa"></i>&nbsp;&nbsp;<span class="bold">Giao Hàng</span></a>
                                            }
                                            else if (Model.Status == 2)
                                            {
                                                <a class="btn btn-success " href="~/admin/order/Upstatus/@Model.Id"><i class="fa"></i>&nbsp;&nbsp;<span class="bold">Hoàn Thành</span></a>
                                            }
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
</div>
            </div>
        </div>

    </div>
</div>
