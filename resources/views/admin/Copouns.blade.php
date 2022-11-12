@extends('layouts.panel')

@section('content')
    <!-- start content -->
    <div class="content copons">
        <!-- start statistics -->
        <div class="statistics">
            <div class="item">
                <div class="top">
                    <div class="number">73</div>
                    <i class="fa-solid fa-ranking-star"></i>
                </div>
                <div class="text">Lorem ipsum dolor sit amet.</div>
            </div>
            <div class="item">
                <div class="top">
                    <div class="number">73</div>
                    <i class="fa-solid fa-users-line"></i>
                </div>
                <div class="text">Lorem ipsum dolor sit amet.</div>
            </div>
            <div class="item">
                <div class="top">
                    <div class="number">73</div>
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
                <div class="text">Lorem ipsum dolor sit amet.</div>
            </div>
        </div>
        <!-- end statistics -->

        <!-- start add copon -->
        <div class="add-copon">
            <button class="add-btn">Add New Coupon</button>
            <form action="" class="global-form">
                <div>
                    <div>
                        <label for="copon">Copon: </label>
                        <input type="text" id="copon" />
                    </div>
                    <div>
                        <label for="copon">Copon: </label>
                        <input type="text" id="copon" />
                    </div>
                </div>
                <div>
                    <div>
                        <label for="start-date">Start Date</label>
                        <input type="date" name="start-date" id="start-date" />
                    </div>
                    <div>
                        <label for="end-date">End Date</label>
                        <input type="date" name="end-date" id="end-date" />
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn">Apply Copon</button>
                    <button class="btn close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </form>
        </div>
        <!-- end add copon -->

        <!-- start table -->
        <div class="responsive-table">
            <table>
                <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                    <th>Column 3</th>
                    <th>Column 4</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>
                        <select>
                            <option>Select Value</option>
                            <option value="active">Active</option>
                            <option value="block">Block</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>
                        <select>
                            <option>Select Value</option>
                            <option value="active">Active</option>
                            <option value="block">Block</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>
                        <select>
                            <option>Select Value</option>
                            <option value="active">Active</option>
                            <option value="block">Block</option>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- end table -->
    </div>
    <!-- end content -->
@endsection
